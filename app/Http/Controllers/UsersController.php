<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Input;
//[add]20181021 次の行を追加
use App\Books;
use App\Rent_logs;
use App\Users;
//[/add]20181021 次の行を追加

class UsersController extends Controller
{
  /**
  * 一覧ページ
  * @return \Illuminate\Http\Response
  */
  public function index()
  {

  }

}
