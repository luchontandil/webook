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

      $this->jpegImgCrop('../public/images/users/'.$imageName, $request->ext);

			$user = User::find($request->userid);
			$user->pfp = 'images/users/'.$imageName;
			$user->save();
			$user->refresh();

			return response()->json($user->pfp);
    }
    public function jpegImgCrop($target_url,$image_type) {//support
      $image = imagecreatefromjpeg($target_url);
      $filename = $target_url;
      $width = imagesx($image);
      $height = imagesy($image);
      // $image_type = imagetypes($image); //IMG_GIF | IMG_JPG | IMG_PNG | IMG_WBMP | IMG_XPM

      if($width==$height) {

       $thumb_width = $width;
       $thumb_height = $height;

      } elseif($width<$height) {

       $thumb_width = $width;
       $thumb_height = $width;

      } elseif($width>$height) {

       $thumb_width = $height;
       $thumb_height = $height;

      } else {
       $thumb_width = 150;
       $thumb_height = 150;
      }

      $original_aspect = $width / $height;
      $thumb_aspect = $thumb_width / $thumb_height;

      if ( $original_aspect >= $thumb_aspect ) {

         // If image is wider than thumbnail (in aspect ratio sense)
         $new_height = $thumb_height;
         $new_width = $width / ($height / $thumb_height);

      }
      else {
         // If the thumbnail is wider than the image
         $new_width = $thumb_width;
         $new_height = $height / ($width / $thumb_width);
      }

      $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

      // Resize and crop
      imagecopyresampled($thumb,
             $image,
             0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
             0 - ($new_height - $thumb_height) / 2, // Center the image vertically
             0, 0,
             $new_width, $new_height,
             $width, $height);
      imagejpeg($thumb, $filename, 80);

 }
    public function changeBio(Request $request)
    {
			$user = User::find($request->userid);
			$user->bio = $request->bio;
			$user->save();
			$user->refresh();

			return response()->json($user->bio);
    }
    public function getFollowers()
    {
      $response = [];
			$user = User::find(Auth::user()->id);
      $followers = $user->followers;
      foreach ($followers as $follower_id) {
        $follower = User::find($follower_id);
        array_push($response, $follower);
      }
			return response()->json($response);
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
