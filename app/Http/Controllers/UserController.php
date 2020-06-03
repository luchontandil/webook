<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

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

	// 	public function changePFP(Request $request){
	//
	//     // Read file contents...
	//     $contents = file_get_contents($request->photo->path());
	//
	//     // ...or just move it somewhere else (eg: local `storage` directory or S3)
	//     $newPath = $request->photo->store('photos', 's3');
	// 		$user = User::where('_id', $request->_id)->get();
	// 		return response()->json(['success'=>'You have successfully upload image.']);
	// }
}
