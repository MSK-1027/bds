<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Happybirthday;

class HappybirthdayController extends Controller
{
    
    public function add()
    {
        return view('admin.happybirthday.create');
    }

    // public function create()
    // {
    //     return redirect('admin/happybirthday/create');
    // }
    public function create(Request $request)
    {
        // Validationを行う
        $this->validate($request, Happybirthday::$rules);

        $happybirthday = new Happybirthday;
        $form = $request->all();

        // フォームから画像が送信されてきたら、保存して、$happybirthday->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $happybirthday->image_path = basename($path);
        } else {
            $happybirthday->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $happybirthday->fill($form);
        $happybirthday->save();

        return redirect('admin/happybirthday/create');
    }

    // 以下を追記
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Setting::where('title', $cond_title)->get();
        } else {
            // それ以外はすべてを取得する
            $posts = Setting::all();
        }
        return view('admin.happybirthday.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit(Request $request)
    {
        // happybirthday Modelからデータを取得する
        $happybirthday = Happybirthday::find($request->id);
        if (empty($happybirthday)) {
            abort(404);
        }
        return view('admin.happybirthday.edit', ['happybirthday_form' => $happybirthday]);
    }
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, happybirthday::$rules);
        // HBD Modelからデータを取得する
        $happybirthday = Happybirthday::find($request->id);//happybirthday=??
        // 送信されてきたフォームデータを格納する
        $happybirthday_form = $request->all();
        if ($request->remove == 'true') {
            $happybirthday_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $happybirthday_form['image_path'] = basename($path);
        } else {
            $happybirthday_form['image_path'] = $happybirthday->image_path;
        }

        unset($happybirthday_form['image']);
        unset($happybirthday_form['remove']);
        unset($happybirthday_form['_token']);

        // 該当するデータを上書きして保存する
        $happybirthday->fill($happybirthday_form)->save();
        $history = new History();
        $history->happybirthday_id = $happybirthday->id;
        $history->edited_at = Carbon::now();
        $history->save();

        return redirect('admin/happybirthday');
    }
    public function delete(Request $request)
    {
        // 該当するhappybirthday Modelを取得
        $happybirthday = Happybirthday::find($request->id);

        // 削除する
        $happybirthday->delete();

        return redirect('admin/happybirthday/');
    }
    
    
}


    
