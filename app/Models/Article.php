<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Article extends Model
{
    use HasFactory;

    protected $table = "articles";
    protected $guarded=[];

    public $timestamps = true; 

     public function user(){
    	// will return the specific sales person 
    	return $this->belongsTo('App\Models\User','user_id','id');
    }

}
