<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

use App\Models\Follow;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;

// use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;

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

            // $users = DB::table('follows')
            // ->where('following_id', Auth::user()->id)
            //         ->get();
            // echo "<pre>";
            // var_dump($users[0]); 
            // echo "</pre>";       

            $users = User::whereNotIn('id', [Auth::user()->id])->get();
                  
           
                 
            // $follow=$users->user_id;
            // dd($follow);

            // $collection = Model::with('user', 'nested.relation')->get();

            // dd($collection);

            // dd(User::all()->first()->Follow()->get());

            // dd(User::find(Auth::user()->id)->Follow()->where('status','pending')->get());


        //    $follows =Follow::with('user')->get();

        //    foreach($follows as $follow){

        //        dd($follow->user); 
        //    }
           

        // $users = User::with(['Follow' => function ($query) {
        //     $query->where('following_id', '=', Auth::user()->id);
        // }])->get();


        // $user = User::find(Auth::user()->id);
        // $user_id = Follow::where("user_id", "=", $user->id)->get();
    //    dd($user);



    //  $follows=DB::table('follows')->get();

       $users_req= User::whereHas('follow', function (Builder $query) {
            $query->where('following_id', 'like', Auth::user()->id)->orWhere("status","=","pending");
        })->get();

        $users_acc=User::whereHas('follow', function (Builder $query) {
            $query->where('follower_id', 'like', 'user_id')->orWhere("status","=","accepted");
        })->get();

        //  echo "<pre>";
        // dd($users_req,$users_acc); 
       
        // echo "</pre>"; 




        // foreach($users_acc as $user){

        //     echo $user;
        // }

    // foreach($follows->following_id as $follow){

    //     echo $follow;
    // }



        // $users= User::whereHas('Follow', function (Builder $query) {
        //     $query->where('following_id', 'like', Auth::user()->id);
        // })->get();

        // dd(User::all()->first()->Follow()->user_id);

        // dd()

        // dd($users);

            //->first()->Follow()

            return view('dashboard',compact(['users','users_req','users_acc']));
        }
        else{

            return redirect("login")->withSuccess('You are not allowed to access');

        }
  
    }





    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
