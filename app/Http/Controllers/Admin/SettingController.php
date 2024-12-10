<?php
// 設定
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\History;
use Carbon\Carbon;

class SettingController extends Controller
{
    public function add()
    {
        // dd("ここが動いた");
    
    return view('admin.setting.create');
    }

    // public function create()
    // {
    //     return redirect('admin/setting/create');
    // }

    public function create(Request $request)
    {
        // Validationを行う
        $this->validate($request, Setting::$rules);

        $setting = new Setting;
        $form = $request->all();

        // フォームから画像が送信されてきたら、保存して、$setting->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $setting->image_path = basename($path);
        } else {
            $setting->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $setting->fill($form);
        $setting->save();

        return redirect('admin/setting/create');
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
        return view('admin.setting.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }

    public function edit(Request $request)
    {
        // setting Modelからデータを取得する
        $setting = Setting::find($request->id);
        if (empty($setting)) {
            abort(404);
        }
        return view('admin.setting.edit', ['setting_form' => $setting]);
    }
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, setting::$rules);
        // setting Modelからデータを取得する
        $setting = Setting::find($request->id);//setting=??
        // 送信されてきたフォームデータを格納する
        $setting_form = $request->all();
        if ($request->remove == 'true') {
            $setting_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $setting_form['image_path'] = basename($path);
        } else {
            $setting_form['image_path'] = $setting->image_path;
        }

        unset($setting_form['image']);
        unset($setting_form['remove']);
        unset($setting_form['_token']);

        // 該当するデータを上書きして保存する
        $setting->fill($setting_form)->save();
        $history = new History();
        $history->setting_id = $setting->id;
        $history->edited_at = Carbon::now();
        $history->save();

        return redirect('admin/setting');
    }
    public function delete(Request $request)
    {
        // 該当するNews Modelを取得
        $setting = Setting::find($request->id);

        // 削除する
        $setting->delete();

        return redirect('admin/setting/');
    }
    public function save(Request $request)
    {
        if(!empty($request->id)){
            $setting = Setting::find($request->id);
            $setting_form = $request->all();
        if ($request->remove == 'true') {
            $setting_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $setting_form['image_path'] = basename($path);
        } else {
            $setting_form['image_path'] = $setting->image_path;
        }

        unset($setting_form['image']);
        unset($setting_form['remove']);
        unset($setting_form['_token']);

        // 該当するデータを上書きして保存する
        $setting->fill($setting_form)->save();
        $msg='更新しました';
    } else {
        $this->validate($request, Setting::$rules);

        $setting0 = new Setting;
        $form = $request->all();

        // フォームから画像が送信されてきたら、保存して、$setting->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $setting0->image_path = basename($path);
        } else {
            $setting0->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $setting0->fill($form);
        $setting0->save();
        $msg='登録しました';
        $setting = $setting0;
    }
    return view('admin.setting.edit', ['setting_form' => $setting]);
}
}