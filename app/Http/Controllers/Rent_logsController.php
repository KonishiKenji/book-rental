<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Input;
use Illuminate\Support\Facades\Auth;

//[add]20181021 次の行を追加
use App\Books;
use App\Rent_logs;
use App\Users;
//[/add]20181021 次の行を追加

class Rent_logsController extends Controller
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

    public function index()
    {
      $booksInfo = Books::all();
      $rentsInfo = Rent_logs::all();

      $userInfo = Auth::user();
      $userName = $userInfo->name;

      $borrowingHistorysInfo = Rent_logs::select(
                                        'rent_logs.id AS id'
                                       ,'books.name AS title'
                                       ,'rent_logs.borrow_date'
                                       ,'rent_logs.return_date'
                                       // ,'users.name AS rent_user'
                                       )
                                       ->where('users.name','=',$userName)
                                       ->join('books','books.id','=','rent_logs.book_id')
                                       ->join('users','users.id','=','rent_logs.rent_user_id')
                                       ->get();

      // [add] ソート・検索機能で、どのテーブルから情報を取得するか（下準備）
      $book = DB::TABLE('books');
      $rent = DB::TABLE('rent_logs');
      // [/add] ソート・検索機能で、どのテーブルから情報を取得するか（下準備）

      // [add]最終的にどの条件でテーブルからGETするか確定させる
      $books = $book->get();
      $rents = $rent->get();
      // [/add]最終的にどの条件でテーブルからGETするか確定させる

      // return view('library-old/libraryBorrowHistory');
      // return view('library/libraryBorrowHistory');
      return view('library/libraryBorrowHistory', ["books" => $books
                                                  ,'rents' => $rents
                                                  // ,'orderById'=>$orderById
                                                  // ,'orderByName'=>$orderByName
                                                  // ,'orderByPrice'=>$orderByPrice
                                                  // ,'orderByStock'=>$orderByStock
                                                  // ,'orderByMaker'=>$orderByMaker
                                                  ,'booksInfo' => $booksInfo
                                                  ,'rentsInfo' => $rentsInfo
                                                  ,'borrowingHistorysInfo' => $borrowingHistorysInfo
                                                  ,'loginUser' => $userName
                                                ]);

    }

}
