<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;





class AuthController extends Controller
{
    public function index()
    {
        $student = DB::table('student')->get()->count();
        return view('Dashboard.index')
            ->with('AllStudent', $student);
    }
    public function create(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|unique:users',
            'userpass' => 'required',
        ]);
        $insert = DB::table('users')->insert([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->userpass),
        ]);
        if ($insert) {
            return redirect('signin');
        } else {
            echo "404 Error Sorry!!";
        }
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'pass' => 'required',
        ]);
        $select = DB::table('users')->where('email', '=', $request->email)->get()->first();
        if ($select) {
            if (Hash::check($request->pass, $select->password)) {
                session()->put('AdminID', $select->id);
                if (session::has('AdminID')) {
                    return redirect('index');
                } else {
                    return view('Dashboard.404');

                    echo "No Session";
                }
            } else {
                return back()->with('fail', "Your Password Is Inncorect");
            }
        } else {
            return back()->with('fail', "Your Email Not Found In Database");
        }
    }
    public function forgotsubmit(Request $request)
    {
        echo $request->email;
        $selec = DB::table('users')->where('email', '=', $request->email)->get()->first();
        if ($selec) {
            $token = str::random(40);
            $update = DB::table('users')->where('email', $request->email)->update([
                'remember_token' => $token,
            ]);
            if ($update) {
                $url = 'new-password/' . $request->email . "/" . $token;
                echo $curl = "<a href='" . $url . "'>GO</a>";
                // return back()->with('success', "Please Check Your Email")->with('link', $curl);
            } else {
                return view('Dashboard.404');

                echo "No Update";
            }
            echo $token;
        } else {
            return back()->with('fail', "Your Email Not Found In Database");
        }
    }
    public function newpassword($email, $token)
    {
        return view('Dashboard.Auth.new-password')->with('email', $email)->with('token', $token);
    }
    public function newpasswordsubmit(Request $request)
    {
        // echo $request->all();
        $update = DB::table('users')->where('email', $request->email)->where('remember_token', $request->token)->update([
            'remember_token' => '',
            'password' => Hash::make($request->password),
        ]);
        if ($update) {
            return redirect('index');
        } else {
            return view('Dashboard.404');
        }
    }
    public function logout()
    {
        session()->pull('AdminID');
        return redirect('signin');
    }
}
