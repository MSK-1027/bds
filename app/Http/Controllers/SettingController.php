<?php
// 設定
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function add(){
        // dd("ここが動いた");
    
    return view('admin.setting.create');
    }

    public function create()
    {
        return redirect('admin/setting/create');
    }

    public function edit()
    {
        return view('admin.setting.edit');
    }

    public function update()
    {
        return redirect('admin/setting/edit');
    }

}
