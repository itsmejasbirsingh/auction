<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Mail;
use File;
use Response;
use App\Http\Services\UtilityService;
use App\Models\Country;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderByDesc('id')->where('is_admin', 0)->with(['country'])->paginate(50);
        return view('users-list', compact('users'));
    }

    public function profile(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('profile', compact('user'));
    }

    public function detail(Request $request, $id)
    {
        $user = User::findOrFail($id);
        return view('user', compact('user'));
    }

    public function verification(Request $request, $id, $status)
    {
        try {
            $user = User::findOrFail($id);
            $user->update([
                'is_verified' => $status
            ]);

            if ($status) {
                $data = array('name' => $user->name);

                $to_name = $user->name;
                $to_email = $user->email;
                Mail::send('mails.verification', $data, function ($message) use ($to_name, $to_email) {

                    $message->to($to_email, $to_name)
                        ->subject('Account Verification');
                });
            }

            return redirect()->back()->with('status', 'User ' . ($status ? 'Verified' : 'Unverified'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function export(Request $request)
    {
        if (empty($request->user_ids) || count($request->user_ids) == 0)
            return redirect()->back()->withErrors('Select users from the list below');

        try {
            $headers = array(
                'Content-Type' => 'text/csv'
            );

            if (!File::exists(public_path() . "/exported-users")) {
                File::makeDirectory(public_path() . "/exported-users");
            }

            $fn = date("d-M-Y") . "-" . time() . "-data.csv";

            $filename = public_path("exported-users/" . $fn);
            $handle = fopen($filename, 'w');

            fputcsv($handle, [
                "Name",
                "Email",
                "Verified",
                "Gender",
                "Timezone",
                "Company Name",
                "Ship Country",
                "Country",
                "State",
                "City",
                "Zip",
                "Address1",
                "Address2",
                "Telephone Number",
                "Certificate"
            ]);

            foreach ($request->user_ids as $user_id) {
                $user = User::findOrFail($user_id);
                fputcsv($handle, [
                    $user->name,
                    $user->email,
                    $user->verificationStatus(),
                    $user->gender,
                    $user->timezone,
                    $user->company_name,
                    $user->country ? $user->country->name : '',
                    $user->shipCountry ? $user->shipCountry->name : '',
                    $user->state,
                    $user->city,
                    $user->zip,
                    $user->address1,
                    $user->address2,
                    $user->telephone_number,
                    url('uploads/certificates/' . $user->certificate)
                ]);
            }

            fclose($handle);

            return Response::download($filename, $fn, $headers);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function import(Request $request)
    {
        try {
            $file = $request->file;

            if (!$file || !file_exists($file) || !is_readable($file))
                return redirect()->back()->withErrors('Unable to read file!');

            $fileArray = UtilityService::csvToArray($file);

            foreach ($fileArray as $file) {

                // Country.
                $found = Country::where('name', $file['Country'])->first();
                if ($found) {
                    $countryId = $found->id;
                } else {
                    $ob = new Country();
                    $ob->name = $file['Country'];
                    $ob->save();
                    $countryId = $ob->id;
                }

                // Ship Country.
                $found = Country::where('name', $file['Ship Country'])->first();
                if ($found) {
                    $shipcountryId = $found->id;
                } else {
                    $ob = new Country();
                    $ob->name = $file['Ship Country'];
                    $ob->save();
                    $shipcountryId = $ob->id;
                }


                $user = new User();
                $user->name = $file["Name"];
                $user->email = $file["Email"];
                $user->gender = $file["Gender"];
                $user->password = bcrypt('Pass@123');
                $user->is_verified = $file["Verified"] == "yes" ? 1 : 0;
                $user->country_id = $countryId;
                $user->ship_country_id = $shipcountryId;
                $user->timezone = $file["Timezone"];
                $user->company_name = $file["Company Name"];
                $user->state = $file["State"];
                $user->city = $file["City"];
                $user->zip = $file["Zip"];
                $user->address2 = $file["Address1"];
                $user->address1 = $file["Address2"];
                $user->telephone_number = $file["Telephone Number"];
                $user->save();
            }

            return redirect()->back()->withStatus('Users imported');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}