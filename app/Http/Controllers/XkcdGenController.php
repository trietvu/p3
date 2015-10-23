<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class XkcdGenController extends Controller {

    public function __construct() {
      function extractWord(){
      $words =	explode(',',file_get_contents('files/crosswd.txt'))[rand(0,113807)];
      return $words;
      }
    }

// This is the function for when user first reach the Lorem Generator page.
// There are no request functions because there should be nothing submitted.
// A default of 3 paragraphs is set to show as an example.
    public function getPswdGen() {
        $wordy = array();
        $numberWords = 4;
        $i = 0;
        while ($i++ < $numberWords - 1) {
          $wordy[] = extractWord();
          $wordy = preg_replace('/\s+/', '-', $wordy);
        }
        $wordy = implode("", $wordy);
        $firstword = extractWord();
        $firstword = preg_replace('/\s+/', '', $firstword);
        $finalwords = $firstword.$wordy;
        return view('xkcdgenerator.get')->with('finalwords', $finalwords);
    }

// This is the function for when they submit the number of paragraphs that they
// want to generate. It includes both the user specified number of pages ($usernum)
// in the request function and the validation for the variable.
    public function postPswdGen(Request $request) {
        $this->validate($request,
        ['numberWords' => 'required|integer|min:1|max:9',
        ]);
        $numberWords = $request->input('numberWords');
        $addNumber = $request->input('addNumber');
        $addNumber = $request->input('addSymbol');
        $addNumber = $request->input('addCapital');
        $addNumber = $request->input('allCaps');
        $addNumber = $request->input('spacing');

        //Checkbox option to add a number at the end of the string.
        if(isset($_POST['addNumber'])){
          $num = rand(1,9);
        }
        else{
          $num = '';
        }

        //Checkbox option to add a symbol at the end of the string.
        if(isset($_POST['addSymbol'])){
          $sym = array('!', '@', '#', '$', '%', '^', '&', '*', '(', ')');
          $symbol = $sym[array_rand($sym)];
        }
        else{
          $symbol = '';
        }

        //Condition to allow user to choose the type of spacing between words
        if(isset($_POST['spacing'])){
          $spacing = $_POST['spacing'];
          if($spacing == 'hyphen'){
            $sp = '-';
          }
          elseif ($spacing == 'space') {
            $sp = ' ';
          }
          else {
            $sp = '';
          }
        }
        else{
          $sp = '-';
        }

        $i = 0;
        while ($i++ < $numberWords - 1) {
          //Condition to add a capital letter to each word
          if(isset($_POST['addCapital'])){
            $wordy[] = ucwords(extractWord());
          }
          //Condition to remove spacing for CamelCase option
          elseif($spacing == 'camelCase'){
              $wordy[] = ucwords(extractWord());
          }
          else{
            $wordy[] = extractWord();
          }

          $wordy = preg_replace('/\s+/', $sp, $wordy);
        }
        $wordy = implode("", $wordy);

        if(isset($_POST['addCapital'])){
          $firstword = ucwords(extractWord());
        }
        //Condition to remove spacing for CamelCase option
        elseif($spacing == 'camelCase'){
            $firstword = ucwords(extractWord());
        }
        else{
          $firstword = extractWord();
        }

        $firstword = preg_replace('/\s+/', '', $firstword);
        //Condition to make all words capital letters
        if(isset($_POST['allCaps'])){
          $wordy = strtoupper($wordy);
        }
        if(isset($_POST['allCaps'])){
          $firstword = strtoupper($firstword);
        }


        $finalwords = $firstword.$wordy.$num.$symbol;
        return view('xkcdgenerator.post')->with('finalwords', $finalwords);
    }
}
