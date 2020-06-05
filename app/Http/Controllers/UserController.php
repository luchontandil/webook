<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function getID(Request $request){
        return User::find(Auth::user()->id)->id;
    }

    public function changePFP(Request $request)
    {
    	$imageName = rand().''.time().''.rand().'.'.$request->ext;
      $request->photo->move(public_path('images/users'), $imageName);

			$user = User::find($request->userid);
			$user->pfp = 'images/users/'.$imageName;
			$user->save();
			$user->refresh();

			return response()->json($user->pfp);
    }
    public function changeBio(Request $request)
    {
			$user = User::find($request->userid);
			$user->bio = $request->bio;
			$user->save();
			$user->refresh();

			return response()->json($user->bio);
    }
	  public function follow(Request $request){
      $user = User::find(Auth::user()->id);
      $userToFollow = User::find($request->userid);

      $exist = false;
      $followList = $user->followList;
      foreach ($followList as $id) {
        if($userToFollow->id == $id){
          $exist=true;
        }
      }
      $followersTarget = $userToFollow->followers;
      if(!$exist){//follow

        array_push($followList, $userToFollow->id);
        array_push($followersTarget, $user->_id);
      }
      else{       // unfollow
        if (($key = array_search( $userToFollow->id, $followList)) !== false) {
          unset($followList[$key]);
        }
        if (($key = array_search( $user->id, $followersTarget)) !== false) {
          unset($followersTarget[$key]);
        }
      }
      $userToFollow->followers = $followersTarget;
      $user->followList = $followList;

      $userToFollow->save();
      $user->save();

      $userToFollow->refresh();
			$user->refresh();

      return response()->json($exist);
    }
}
