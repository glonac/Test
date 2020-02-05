<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
   protected $table = 'news';
   protected $fillable = ['id','name','description','content'];
   public function getNewsList(){
       return $this->get();
   }
   public function getNewsById($id){
       return $this->where('id',$id)->get();
   }
}
