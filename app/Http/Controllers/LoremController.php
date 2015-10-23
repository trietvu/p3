<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Badcow\LoremIpsum\Generator;
use Illuminate\Http\Request;

class LoremController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions

    }
// This is the function for when user first reach the Lorem Generator page.
// There are no request functions because there should be nothing submitted.
// A default of 3 paragraphs is set to show as an example.
    public function getLorem() {
        $generator = new Generator();
        $paragraphs = $generator->getParagraphs(3);
        $finalgen = implode('<p>', $paragraphs);
        return view('lorem-ipsum.get')->with('finalgen', $finalgen);
    }

// This is the function for when they submit the number of paragraphs that they
// want to generate. It includes both the user specified number of pages ($usernum)
// in the request function and the validation for the variable.
    public function postLorem(Request $request) {
        $this->validate($request,
        ['usernum' => 'required|integer|min:1|max:99',
        ]);
        $usernum = $request->input('usernum');

        $generator = new Generator();
        $paragraphs = $generator->getParagraphs($usernum);
        $finalgen = implode('<p>', $paragraphs);
        return view('lorem-ipsum.create')->with('finalgen', $finalgen);
    }
}
