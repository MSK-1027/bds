<?php
// 誕生日
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HappybirthdaysdController extends Controller
{
    public function add()
    {
        return view('admin.happybirthday.create');
    }

    public function create()
    {
        return redirect('admin/happybirthday/create');
    }

    public function edit()
    {
        return view('admin.happybirthday.edit');
    }

    public function update()
    {
        return redirect('admin/happybirthday/edit');
    }

}
