<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Mail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register')->with([
            'countries' => Country::all()
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password' => ['required', 'confirmed', 'min:4', 'max: 20'],
        ]);

        try {
            \DB::beginTransaction();
            $user = User::create($request->all());

            $certificateFilename = time() . rand(99, 999999) . '.' . $request->certificate->extension();

            $request->certificate->move(public_path('uploads/certificates'), $certificateFilename);

            $user->certificate = $certificateFilename;

            $user->password = bcrypt($request->password);

            $user->update();

            \DB::commit();

            event(new Registered($user));

            $data = array('name' => $user->name);

            $to_name = $user->name;
            $to_email = $user->email;

            Mail::send('mails.user-register', $data, function ($message) use ($to_name, $to_email) {

                $message->to($to_email, $to_name)
                    ->cc([env("MAIL_FROM_ADDRESS")])
                    ->subject('New Registration');

                $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));
            });

            // Auth::login($user);
            return redirect()->route('login', ['registration' => 'success']);
        } catch (\Exception $e) {
            \DB::rollback();
            return redirect()->back()->withErrors($e->getMessage());
        }


    }
}