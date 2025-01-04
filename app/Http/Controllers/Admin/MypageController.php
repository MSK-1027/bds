<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mypage;

class MypageController extends Controller
{

    public function index()
    {
        return view('admin.mypage.sample');
    }
}
