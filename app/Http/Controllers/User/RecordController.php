<?php
// 記録
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function add()
    {
        return view('admin.record.create');
    }

    public function create()
    {
        return redirect('admin/record/create');
    }

    public function edit()
    {
        return view('admin.record.edit');
    }

    public function update()
    {
        return redirect('admin/record/edit');
    }
}


