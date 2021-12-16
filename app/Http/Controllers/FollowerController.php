<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\follow;

class FollowerController extends Controller
{
   public function SendRequest(Request $request){

    //   dd($request->all()); 

   

        $follows=new follow();
        $follows->user_id=$request->input('sender_id');
        $follows->following_id=$request->input('reciever_id');
        $follows->follower_id="0";
        $follows->status="pending";

        $follows->save();

        return redirect('')->withSuccess('You have signed-in');
   }

   public function SendBackRequest(Request $request){

      // $follows=new follow();
      // $follows->user_id=$request->input('sender_id');
      // $follows->following_id=$request->input('reciever_id');
      // $follows->follower_id="0";
      // $follows->status="pending";

      // $follows->save();

      // return redirect('')->withSuccess('You have signed-in');
      
   }
}
