<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Badcow\LoremIpsum\Generator;
use Illuminate\Http\Request;

class LoremController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions

    }

    public function getLorem() {
        $generator = new Generator();
        $paragraphs = $generator->getParagraphs(3);
        $finalgen = implode('<p>', $paragraphs);
        return view('lorem-ipsum.get')->with('finalgen', $finalgen);
    }

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
