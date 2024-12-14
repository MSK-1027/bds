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
        'userid' ,
        'birthdaytitle' ,
        'birthday' ,
        'gender' ,
        'babyname' ,
        'birthdaytime' ,
        'babyheight' ,
        'baby body weight' ,
        'image' ,
        'comment' ,
            
    ];

    public static $rules = array(
    'birthday' => 'required',
    'birthdaytime' => 'required',
    'gender' => 'required',
    'babyheight' => 'required',
    'babybodyweight' => 'required',
);

    
}
