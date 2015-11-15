<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PictureTable extends Model
{
    protected $table = 'PictureTables'; 
    protected $primaryKey = 'PictureID';

 
         public function UserTable()
    {
        return $this->hasMany('App\UserTable');
    }
}
