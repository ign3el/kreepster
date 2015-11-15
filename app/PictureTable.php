<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PictureTable extends Model
{
    protected $table = 'PictureTables'; 
    protected $primaryKey = 'PictureID';
    protected $guarded = ['PictureID'];
 
         public function UserTable()
    {
        return $this->belongsTo('App\UserTable');

    }
}
