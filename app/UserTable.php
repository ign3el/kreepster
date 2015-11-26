<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTable extends Model
{
    protected $table = 'UserTables'; 
    protected $primaryKey = 'UserName';
    protected $guarded = ['UserID'];

   // protected $hidden = ['created_at'];
         public function PictureTable()
    {
        return $this->hasMany('App\PictureTable','PictureID','UserName');
    }
}
