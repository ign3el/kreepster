<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPicture extends Model
{
   	protected $table = 'UserPictures'; 
    protected $primaryKey = 'UserPictureID';

         public function PictureTable()
    {
        return $this->belongsTo('App\PictureTable');
    }
     public function UserTable()
    {
        return $this->belongsTo('App\UserTable');
    }
}