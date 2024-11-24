<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    public static $rules = array(
        'setting_id' => 'required',
        'edited_at' => 'required',
    );
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Setting::$rules);
        // setting Modelからデータを取得する
        $setting = Setting::find($request->id);
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

        // 以下を追記
        $history = new History();
        $history->setting_id = $setting->id;
        $history->edited_at = Carbon::now();
        $history->save();

        return redirect('admin/setting');
        'week' => 'required',
        'day' => 'required',
        'babyheight' => 'required',
        'babybodyweight' => 'required',
    }
}
