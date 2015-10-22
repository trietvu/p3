<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /books
    */
    public function getIndex() {
        return view('books.get');
    }

    /**
     * Responds to requests to GET /books/show/{id}
     */
     public function getShow($title = NULL) {
     return view('books.show')->with('title', $title);
 }

    /**
     * Responds to requests to GET /books/create
     */
    public function getCreate($title = NULL) {
      return view('books.create')->with('title', $title);
    }

    /**
     * Responds to requests to POST /books/create
     */
    public function postCreate(Request $request) {
        $this->validate($request,
        ['title' => 'required|min:2',]);
        return 'Process adding new book: '.$request->input('title');
    }
}
