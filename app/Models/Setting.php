<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $guarded = array('id');
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id' ,
        'firsttitle' , 
        'mothername' ,
        'babyname' ,
        'duedate'  ,
        'comment'  ,
    ];

    public static $rules = array(
        'mothername' => 'required',
        'duedate' => 'required',
        
        
    );
    public function histories()
    {
        return $this->hasMany('App\Models\History');
    }
}
