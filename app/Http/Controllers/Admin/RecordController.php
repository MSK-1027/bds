<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Record;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{

    public function add()
    {
        return view('admin.record.create');
    }

    // public function create()
    // {
    //     return redirect('admin/record/create');
    // }
    public function create(Request $request)
    {
        // Validationを行う
        $this->validate($request, Record::$rules);

        $record = new Record;
        $form = $request->all();

        // フォームから画像が送信されてきたら、保存して、$record->echoimage に画像のパスを保存する
        if (isset($form['echoimage'])) {
            $path = $request->file('echoimage')->store('public/image');
            $record->echoimage = basename($path);
        } else {
            $record->echoimage = null;
        }

        // フォームから画像が送信されてきたら、保存して、$record->echoimage に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $record->image = basename($path);
        } else {
            $record->image = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);



        // データベースに保存する

        $record->user_id = Auth::id();
        $record->fill($form);
        $record->save();

        return redirect('admin/mypage');
    }

    // 記録登録するフォーム
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
        return view('admin.record.index', ['posts' => $posts, 'cond_title' => $cond_title]);//titl入力名！！
    }
    public function edit(Request $request,$id)
    {
        // record Modelからデータを取得する
        $record = Record::find($id);
        if (empty($record)) {
            abort(404);
        }
        return view('admin.record.edit', ['record_form' => $record]);
    }
    public function update(Request $request,$id)
    {
        // Validationをかける
        $this->validate($request, record::$rules);
        // record Modelからデータを取得する
        $record = Record::find($request->id);//record=??
        // 送信されてきたフォームデータを格納する
        $record_form = $request->all();
       //エコ
        if ($request->remove == 'true') {

            $record_form['echoimage'] = null;
        } elseif ($request->file('echoimage')) {
            $path = $request->file('echoimage')->store('public/image');
            $record_form['echoimage'] = basename($path);
        } else {
            $record_form['echoimage'] = $record->echoimage;
        }
        //お腹の写真
        if ($request->remove == 'true') {
            $record_form['image'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $record_form['image'] = basename($path);
        } else {
            $record_form['image'] = $record->image;
        }


        unset($record_form['remove']);
        unset($record_form['_token']);

        // 該当するデータを上書きして保存する
        $record->fill($record_form)->save();

        return redirect('admin/mypage');
    }
    public function delete(Request $request)
    {
        // 該当するNews Modelを取得
        $record = Record::find($request->id);

        // 削除する
        $record->delete();

        return redirect('admin/record/');
    }


}




