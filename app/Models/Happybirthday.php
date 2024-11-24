<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Happybirthday extends Model
{
    use HasFactory;
    protected $guarded = array('id');
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'userid' => 'required',
        'birthdaytitle' => 'required',
        'birthday' => 'required',
        'gender' => 'required',
        'babyname' => 'required',
        'birthdaytime' => 'required',
        'babyheight' => 'required',
        'baby body weight' => 'required',
        'image' => 'required',
        'comment' => 'required',
            
    ];

    public static $rules = array(
    'birthday' => 'required',
    'birthdaytime' => 'required',
    'gender' => 'required',
    'babyheight' => 'required',
    'babybodyweight' => 'required',
);

    
}
