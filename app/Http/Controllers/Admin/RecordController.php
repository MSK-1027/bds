<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Record;

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

        // フォームから画像が送信されてきたら、保存して、$record->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $record->image_path = basename($path);
        } else {
            $record->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $record->fill($form);
        $record->save();

        return redirect('admin/record/create');
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
    public function edit(Request $request)
    {
        // record Modelからデータを取得する
        $record = Record::find($request->id);
        if (empty($record)) {
            abort(404);
        }
        return view('admin.record.edit', ['record_form' => $record]);
    }
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, record::$rules);
        // record Modelからデータを取得する
        $record = Record::find($request->id);//record=??
        // 送信されてきたフォームデータを格納する
        $record_form = $request->all();
        if ($request->remove == 'true') {
            $record_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $record_form['image_path'] = basename($path);
        } else {
            $record_form['image_path'] = $record->image_path;
        }

        unset($record_form['image']);
        unset($record_form['remove']);
        unset($record_form['_token']);

        // 該当するデータを上書きして保存する
        $record->fill($record_form)->save();
        $history = new History();
        $history->record_id = $record->id;
        $history->edited_at = Carbon::now();
        $history->save();

        return redirect('admin/record');
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




