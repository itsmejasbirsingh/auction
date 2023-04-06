<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Mail;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderByDesc('id')->where('is_admin', 0)->with(['country'])->paginate(50);
        return view('users-list', compact('users'));
    }

    public function profile(Request $request){
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
}