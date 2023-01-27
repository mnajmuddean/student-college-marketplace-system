<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model
{
    use HasFactory;
    protected $guarded = [];

     public function product(){
    	return $this->belongsTo(Product::class,'productID','productID');
    }


     public function user(){
    	return $this->belongsTo(User::class,'userID','id');
    }
}
