<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\follows;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        return view('login');
    }
    
    

    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended()
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }



    public function registration()
    {
        return view('registration');
    }




    public function Register(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));

        $user=new User();
        $user->name=$name;
        $user->email=$email;
        $user->password=$password;

        $user->save();
         
        return redirect('login')->withSuccess('You have signed-in');
    }





    public function dashboard()
    {
        if(Auth::check()){

            // $users = DB::table('users')
            // ->whereNotIn('id', [Auth::user()->id])
            //         ->get();

            $users = User::whereNotIn('id', [Auth::user()->id])
                   ->get();

                 
            // $follow=$users->user_id;
            // dd($follow);
            dd($users);


            return view('dashboard',compact('users'));
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }





    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
