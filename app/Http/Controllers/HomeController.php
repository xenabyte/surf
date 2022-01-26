<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Redirect;
use Log;

//model
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        return view('welcome');
    }

    public function checkBalance (Request $request)
    {
        try {
            $this->validate($request, User::getCheckBalanceValidation());
        } catch(ValidationException $e) {
            Log::error($e);
        }

        if(!$user = User::where('username', $request->username)->where('password', (md5($request->password)))->first()){
            alert()->error('Invalid username/password', 'Opps!!!')->persistent("Close");
            return redirect()->back();
        }

        $dataBalance = $user->srvid == USER::VIP_USERS ? 'Unlimited Bandwidth' :  $this->formatBytes($user->comblimit);

        $user->dataBalance = $dataBalance;

        return view('welcome', [
            'user' => $user
        ]);
    }

    public function updatePassword (Request $request)
    {
        try {
            $this->validate($request, User::getUpdatePasswordValidation());
        } catch(ValidationException $e) {
            Log::error($e);
        }

        if(!$user = User::where('username', $request->username)->where('password', md5($request->old_password))->first()){
            alert()->error('Invalid username/password', 'Opps!!!')->persistent("Close");
            return redirect()->back();
        }

        if($request->new_password != $request->confirm_password){
            alert()->error('Password Mismatch', 'Opps!!!')->persistent("Close");
            return redirect()->back();
        }

        $updatePassword = User::where('username', $request->username)->where('password', md5($request->old_password))->update(['password' => md5($request->new_password)]);
            if($updatePassword){
            alert()->success('Changes Saved', 'Good!!!')->persistent("Close");
            return redirect()->back();
        }

        alert()->error('Something Went Wrong', 'Opps!!!')->persistent("Close");
        return redirect()->back();
    }
}
