<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class PictureTable extends Model
{
    protected $table = 'PictureTables'; 
    protected $primaryKey = 'PictureID';
    protected $guarded = ['PictureID'];
 
         public function UserTable()
    {
        return $this->belongsTo('App\UserTable');

    }
    public static function getByDistance($lat, $lng, $distance,$uid)
{
  $results = DB::select(DB::raw('SELECT PictureID, ( 3959 * acos( cos( radians(' . $lat . ') ) * 
  	cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $lng . ') ) + 
  	sin( radians(' . $lat .') ) * sin( radians(latitude) ) ) ) AS distance FROM PictureTables where UserName != "'.$uid.'"
  HAVING distance <= ' . $distance . ' ORDER BY distance') );
  return $results;
}
  public static function getAllDistance($lat, $lng,$uid)
{
  $results = DB::select(DB::raw('SELECT PictureID, ( 3959 * acos( cos( radians(' . $lat . ') ) * 
    cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $lng . ') ) + 
    sin( radians(' . $lat .') ) * sin( radians(latitude) ) ) ) AS distance FROM PictureTables where UserName != "'.$uid.'"
   ORDER BY distance') );
  return $results;
}
	public function distance_haversine($lapublit1, $lon1, $lat2, $lon2) {

      $earth_radius = 3960.00; # in miles
      $delta_lat = $lat_2 - $lat_1 ;
      $delta_lon = $lon_2 - $lon_1 ;
      $alpha    = $delta_lat/2;
      $beta     = $delta_lon/2;
       $a   = sin(deg2rad($alpha)) * sin(deg2rad($alpha)) + cos(deg2rad($lat1)) *           cos(deg2rad($lat2)) * sin(deg2rad($beta)) * sin(deg2rad($beta)) ;
      $c        = asin(min(1, sqrt($a)));
      $distance = 2*$earth_radius * $c;
      $distance = round($distance, 4);

      return $distance;
    }

}
