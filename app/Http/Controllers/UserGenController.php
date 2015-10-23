<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

// require the Faker autoloader
require_once '/var/www/html/p3/vendor/fzaninotto/faker/src/autoload.php';

class UserGenController extends Controller {

  public function __construct() {
        # Put anything here that should happen before any of the other actions
    }
// This is the function for when user first reach the Random User Generator page.
// There are no request functions because there should be nothing submitted.
  public function getUserGen() {
    return view('usergenerator.getusergen');
    }
// This is the function for when they submit the number of users that they
// want to generate. It includes both the user specified number of random users ($users)
// in the request function and the validation for the variable.
  public function postUserGen(Request $request) {
    $users = $request->input('users');
    $this->validate($request,
    ['users' => 'required|integer|min:1|max:99',
    ]);

    $title = $request->input('title');
    $birthdate = $request->input('birthdate');
    $address = $request->input('address');
    $phone = $request->input('phone');
    $profile = $request->input('profile');

    $faker = Faker::create();
    $username = array();
// for loop cycles through generating an array for each option. Inclusion of the username is a default.
// if statements determine which selected variables will be displayed.
      for ($i = 0; $i < $users; $i++){
        if (isset($title)){
        $username[] = '<div class="users">'.$faker->title.' '.$faker->name.'<br>';
        }
      else{
            $username[] = '<div class="users">'.$faker->name.'<br>';
        }
        if (isset($birthdate)){
        $username[] = 'Birthdate: '.$faker->dateTimeThisCentury->format('m-d-Y').'<br><br>';
        }
        else{ $username[] = '<br>';

        }
        if (isset($address)){
        $username[] = '<b>Address:</b><br>'.$faker->streetAddress.'<br>'.$faker->city.' '.$faker->state.' '.$faker->postcode.'<br><br>';
        }
        if (isset($phone)){
        $username[] = 'Phone number: '.$faker->phoneNumber.'<br><br>';
        }
        if (isset($profile)){
        $username[] = 'Profile: '.$faker->text.'</div>';
        }
        else{
          $username[] = '</div>';
        }
      }
      return view('usergenerator.postusergen')->with('users', $users)->with('username', $username);
  }
}
