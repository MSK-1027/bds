<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Setting;
use App\Models\Record;
use App\Models\Happybirthday;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        
        \Log::debug('Received data:', $data);
        // dd($data);
        // dd($data['name']);
        // $user = User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();
        // dd("ここまでOK");

        // // TODO: Settingテーブルにレコードを追加する
        // $setting = Setting::create([
        //     // 'user_id' => $user->id,
        //     'firsttitle' => '',
        //     'mothername' => '',
        //     'babyname' => '',
        //     'duedate' => '',
        //     'comment' => '',
            
        // ]);
        //  // TODO: recordテーブルにレコードを追加する
        //  $record = Record::create([
        //     'userid' => $user->id,
        //     'weekday' => '',
        //     'babyheight' => '',
        //     'babybodyweight' => '',    
        //     'motherbodyweight' => '',
        //     'comment' => '',
        //     'echoimage' => '',
        //     'image' => '',
        // ]);
        
        // // TODO: happyテーブルにレコードを追加する
        // $happybirthday = Happybirthday::create([
        //     'userid' => $user->id,
        //     'birthdaytitle' => '',
        //     'birthday' => '',
        //     'gender' => '',
        //     'babyname' => '',
        //     'birthdaytime' => '',
        //     'babyheight' => '',
        //     'baby body weight' => '',
        //     'image' => '',
        //     'comment' => '',
            
        // ]);


        return $user;
    }
}
