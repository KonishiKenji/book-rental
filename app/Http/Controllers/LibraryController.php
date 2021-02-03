<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Input;

//[add]20181021 次の行を追加
use App\Library;
//[/add]20181021 次の行を追加

class LibraryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    // public function index(Request $request)
    public function index()
    {
      // $test = "test";
      // return view('library-old/libraryHome');
      return view('library/libraryHome');

    }

    public function borrowingList()
    {
      // return view('library-old/libraryBorrowingList');
      return view('library/libraryBorrowingList');

    }

    public function borrowHistory()
    {
      // return view('library-old/libraryBorrowHistory');
      return view('library/libraryBorrowHistory');
    }

}
