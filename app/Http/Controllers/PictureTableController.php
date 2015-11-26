<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PictureTable;
use App\UserPicture;
use App\Http\Requests\PictureRequest;
use DB;
use File;
use App\UserTable;
use Intervention\Image\ImageManagerStatic as Image;
class PictureTableController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pics = PictureTable::all();
         if(!$pics) {
            return response()->json(['message' => 'Does Not Exists!!!','code' =>404],404);
        }
        return response()->json(['data' => $pics]);
    }

       public function getPictures($uid,$ulat,$ulong) {

        $user = \App\UserTable::find($uid);
        if(!$user){
            return response()->json(['message'=>'No Such User','code'=>404],404);
        }
        $distance = $user->distance;
        $query = PictureTable::getByDistance($ulat,$ulong,$distance);
        if(empty($query)) {
        return response()->json(['message'=>'No Image within the selected distance','code'=>404 ],404);
        }

        $ids = [];
       foreach($query as $q)
       {
          array_push($ids, $q->PictureID);
        }

         //Get the listings that match the returned ids
        $results =PictureTable::whereIn('PictureID', $ids)->get();
        //$img_data = 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPG1ldGEgaHR0cC1lcXVpdj0iQ29udGVudC1UeXBlIiBjb250ZW50PSJ0ZXh0L2h0bWw7IGNoYXJzZXQ9dXRmLTgiPg0KPC9oZWFkPg0KPHRhYmxlIGFsaWduPSJjZW50ZXIiIHN0eWxlPSJiYWNrZ3JvdW5kLWNvbG9yOiNGRkZGRkY7IG1hcmdpbjo1cHggYXV0bzsgcGFkZGluZzozcHggNXB4OyB3aWR0aDoxMDAlOyI+DQo8dHI+DQoJPHRkIHN0eWxlPSJ2ZXJ0aWNhbC1hbGlnbjp0b3A7IHBhZGRpbmc6MTBweDsgd2lkdGg6NjgwcHg7Ij4NCg0KPGRpdiBpZD0iY3VzdG9tLWNvbnRlbnQiIGNsYXNzPSJ3aGl0ZS1wb3B1cC1ibG9jayIgc3R5bGU9Im1heC13aWR0aDo3NTBweDsgbWFyZ2luOiAyMHB4IGF1dG87Ij4NCjxzdHlsZT4NCiAgICAjY3VzdG9tLWNvbnRlbnQgaW1nIHttYXgtd2lkdGg6IDEwMCU7bWFyZ2luLWJvdHRvbTogMTBweDt9DQogICAgPC9zdHlsZT4NCjxkaXYgc3R5bGU9Im1hcmdpbi1ib3R0b206IDhweDsiPg0KPHNjcmlwdCBhc3luYyBzcmM9Ii8vcGFnZWFkMi5nb29nbGVzeW5kaWNhdGlvbi5jb20vcGFnZWFkL2pzL2Fkc2J5Z29vZ2xlLmpzIj48L3NjcmlwdD4NCjwhLS0gQXV0by10b3AgLS0+DQo8aW5zIGNsYXNzPSJhZHNieWdvb2dsZSINCiAgICAgc3R5bGU9ImRpc3BsYXk6YmxvY2siDQogICAgIGRhdGEtYWQtY2xpZW50PSJjYS1wdWItMjU4NTQwNTQ4MzkxODM4NiINCiAgICAgZGF0YS1hZC1zbG90PSI3NzM2NzM2MTQ4Ig0KICAgICBkYXRhLWFkLWZvcm1hdD0iYXV0byI+PC9pbnM+DQo8c2NyaXB0Pg0KKGFkc2J5Z29vZ2xlID0gd2luZG93LmFkc2J5Z29vZ2xlIHx8IFtdKS5wdXNoKHt9KTsNCjwvc2NyaXB0Pg0KPC9kaXY+DQoJCQkJIDxpbWcgc3JjPSIvaW1hZ2VzL2NyaXN0aWFuby1yb25hbGRvL2NyaXN0aWFuby1yb25hbGRvLTAzLmpwZyIgYWx0PSIiIHN0eWxlPSJwYWRkaW5nOiAwOyIgPg0KCQkgIA0KPHNjcmlwdCBhc3luYyBzcmM9Ii8vcGFnZWFkMi5nb29nbGVzeW5kaWNhdGlvbi5jb20vcGFnZWFkL2pzL2Fkc2J5Z29vZ2xlLmpzIj48L3NjcmlwdD4NCjwhLS0gQXV0by10b3AgLS0+DQo8aW5zIGNsYXNzPSJhZHNieWdvb2dsZSINCiAgICAgc3R5bGU9ImRpc3BsYXk6YmxvY2siDQogICAgIGRhdGEtYWQtY2xpZW50PSJjYS1wdWItMjU4NTQwNTQ4MzkxODM4NiINCiAgICAgZGF0YS1hZC1zbG90PSI3NzM2NzM2MTQ4Ig0KICAgICBkYXRhLWFkLWZvcm1hdD0iYXV0byI+PC9pbnM+DQo8c2NyaXB0Pg0KKGFkc2J5Z29vZ2xlID0gd2luZG93LmFkc2J5Z29vZ2xlIHx8IFtdKS5wdXNoKHt9KTsNCjwvc2NyaXB0Pg0KDQoNCgk8L3RkPg0KCTx0ZCBzdHlsZT0icGFkZGluZzowcHggMHB4IDBweCAxMHB4OyB3aWR0aDozMDBweDsiPg0KPHNjcmlwdCBhc3luYyBzcmM9Ii8vcGFnZWFkMi5nb29nbGVzeW5kaWNhdGlvbi5jb20vcGFnZWFkL2pzL2Fkc2J5Z29vZ2xlLmpzIj48L3NjcmlwdD4NCjwhLS0gRHJlYW0gLSAxNjAqNjAwIC0tPg0KPGlucyBjbGFzcz0iYWRzYnlnb29nbGUiDQogICAgIHN0eWxlPSJkaXNwbGF5OmlubGluZS1ibG9jazt3aWR0aDozMDBweDtoZWlnaHQ6NjAwcHgiDQogICAgIGRhdGEtYWQtY2xpZW50PSJjYS1wdWItMjU4NTQwNTQ4MzkxODM4NiINCiAgICAgZGF0YS1hZC1zbG90PSI5MzcyNTUzMzQxIj48L2lucz4NCjxzY3JpcHQ+DQooYWRzYnlnb29nbGUgPSB3aW5kb3cuYWRzYnlnb29nbGUgfHwgW10pLnB1c2goe30pOw0KPC9zY3JpcHQ+DQoJPC90ZD4NCjwvdHI+DQo8L3RhYmxlPg0KPGRpdiBzdHlsZT0iZmxvYXQ6cmlnaHQ7Ij4NCjwhLS1MaXZlSW50ZXJuZXQgY291bnRlci0tPjxzY3JpcHQgdHlwZT0idGV4dC9qYXZhc2NyaXB0Ij48IS0tDQpkb2N1bWVudC53cml0ZSgiPGEgaHJlZj0nLy93d3cubGl2ZWludGVybmV0LnJ1L2NsaWNrJyAiKw0KInRhcmdldD1fYmxhbms+PGltZyBzcmM9Jy8vY291bnRlci55YWRyby5ydS9oaXQ/dDM4LjE7ciIrDQplc2NhcGUoZG9jdW1lbnQucmVmZXJyZXIpKygodHlwZW9mKHNjcmVlbik9PSJ1bmRlZmluZWQiKT8iIjoNCiI7cyIrc2NyZWVuLndpZHRoKyIqIitzY3JlZW4uaGVpZ2h0KyIqIisoc2NyZWVuLmNvbG9yRGVwdGg/DQpzY3JlZW4uY29sb3JEZXB0aDpzY3JlZW4ucGl4ZWxEZXB0aCkpKyI7dSIrZXNjYXBlKGRvY3VtZW50LlVSTCkrDQoiOyIrTWF0aC5yYW5kb20oKSsNCiInIGFsdD0nJyB0aXRsZT0nTGl2ZUludGVybmV0JyAiKw0KImJvcmRlcj0nMCcgd2lkdGg9JzMxJyBoZWlnaHQ9JzMxJz48L2E+IikNCi8vLS0+PC9zY3JpcHQ+PCEtLS9MaXZlSW50ZXJuZXQtLT4JICAgICAJCQ0KPC9kaXY+DQo8L2JvZHk+DQo8L2h0bWw+DQo=';
        //$dec = base64_decode($img_data);
        //print_r($img_data);
        return response()->json(['message'=>'Success','Images'=>$results,'code'=>200],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $values = $request->all();
         $uname = $values['UserName'];
         $uid = UserTable::find($uname);
         if(!$uid) {
            return response()->json(['message'=>'No Such User Found','code'=>404],404);
         } else {
         $puid = $uid->UserID;
          $img64 = $values['PictureUrl'];
          $image = base64_decode($img64);
          $image_name= $values['ImageName'].".".$values['ImageExtn'];
          $path = public_path() . "/images/".$puid."/" . $image_name;
          $values['PictureUrl'] = "images/".$puid."/".$image_name;
          unset($values['ImageName']);
          unset($values['ImageExtn']);
          $values['UserId'] = $puid;
          if(File::exists('images/'.$puid)) {
            file_put_contents($path, $image);
            PictureTable::create($values);
            return response()->json(['message' => 'Successfully Added Picture','code'=>202],202);
          } else {
            mkdir('images/'.$puid);
            file_put_contents($path, $image);
            PictureTable::create($values);
            return response()->json(['message' => 'Successfully Added Picture','code'=>202],202);
          }
         // echo "<img src = '/images/".$a->UserID."/".$image_name."' />";
        }
    }
    public function rating($type) {

        if($type == "beauty") {

            $pic = PictureTable::orderby('BeautyCount','DESC')->take(5)->get();
            return response()->json(['data'=>$pic,'code'=>200],200);

        }else if($type == "kreepy") {
            $pic = PictureTable::orderby('KreepCount','DESC')->take(5)->get();
            return response()->json(['data'=>$pic,'code'=>200],200);
        }else {
            return response()->json(['message'=>'Invalid Entry','code'=>404],404);
        }

    }
    public function action(Request $request,$pid, $action,$uid) {

        if($action == 'beauty'){
            $pic = PictureTable::find($pid);
            if(!$pic) {
                return response()->json(['error' =>'Invalid Picture ID','code'=>404],404);
            }
            $count =  $pic->BeautyCount;
            $pic->BeautyCount = $count + 1;
            $pic->save();
            $userAction = new UserPicture;
            $userAction->UserID = $uid;
            $userAction->PictureID = $pid;
            $userAction->userAction = '1';
            $userAction->save();
            return response()->json(['message' =>'updated beuty count','code'=>202],202);
        }else if($action == 'kreepy') {
             $pic = PictureTable::find($pid);
            if(!$pic) {
                return response()->json(['error' =>'Invalid Picture ID','code'=>404],404);
            }
            $count =  $pic->KreepCount;
            $pic->KreepCount = $count + 1;
            $pic->save();
            $userAction = new UserPicture;
            $userAction->UserID = $uid;
            $userAction->PictureID = $pid;
            $userAction->userAction = '-1';
            $userAction->save();
            return response()->json(['message' =>'updated Kreep count','code'=>202],202);
        } else {
            return response()->json(['error' =>'Invalid Action On Picture','code'=>404],404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pics = PictureTable::find($id);
         if(!$pics) {
            return response()->json(['message' => 'Does Not Exists!!!','code' =>404],404);
        }
        return response()->json(['data' => $pics]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
