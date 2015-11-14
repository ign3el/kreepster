<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTable extends Model
{
    protected $table = 'UserTables'; 
    protected $primaryKey = 'UserID';
   // protected $hidden = ['created_at'];
}
