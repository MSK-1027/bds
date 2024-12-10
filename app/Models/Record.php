<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
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
        'weekday' => 'required',
        'babyheight' => 'required',
        'babybodyweight' => 'required',
        'motherbodyweight' => 'required',
        'comment' => 'required',
        'echoimage' => 'required',
        'image' => 'required',
        
    ];

    public static $rules = array(
        
        'weekday' => 'required',
        'babyheight' => 'required',
        'babybodyweight' => 'required',
        
        
    );
    public function histories()
    {
        return $this->hasMany('App\Models\History');
    }

}