<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Micropost extends Model
{
     use Notifiable;
     
     protected $fillable =
     [
     'image1','image2','image3','image4','hotel_name','content','prefecture','price','evaluate'
     ];
     
     public function user()
     {
         return $this->belongsTo(User::class);
     }
     
     public function getImageCount()
     {    
          $count = 0;
          
          if($this->image1 != null) {
             $count++;
          }
          if($this->image2 != null){
             $count++;
          }
          if($this->image3 != null){
             $count++;
          }
          if($this->image4 != null){
             $count++;
          }
          return $count;
          
          
     }
     
         
         
}
