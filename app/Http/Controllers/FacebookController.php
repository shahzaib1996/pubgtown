<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use Auth;
use Illuminate\Support\Facades\Hash;

class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        // try {
            $user = Socialite::driver('facebook')->user();
            $create['name'] = $user->getName();
            $create['email'] = $user->getEmail();
            $create['password'] = Hash::make('PuBg@tOwN');
            $create['facebook_id'] = $user->getId();
            $create['avatar'] = "http://graph.facebook.com/".$user->getId()."/picture?type=square";


            // http://graph.facebook.com/67563683055/picture?type=square
            // print_r($user->getId());
            // die();


            $userModel = new User;
            $createdUser = $userModel->addNew($create);
            Auth::loginUsingId($createdUser->id);


            return redirect()->route('user');


        // } catch (Exception $e) {


        //     return redirect()->to('/');


        // }
    }
}
