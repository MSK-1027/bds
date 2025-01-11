<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mypage;
use App\Models\Record;

class MypageController extends Controller
{

    public function index()
    {
         // レコードを全て取得
         $records = Record::all();

         // Blade にデータを渡して表示

        return view('admin.mypage.index', compact('records'));
    }
}
