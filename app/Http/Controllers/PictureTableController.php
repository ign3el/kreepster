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
use Input;
use Intervention\Image\ImageManagerStatic as Image;
class PictureTableController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sid = $request->only('UserName');
        $x = $sid['UserName'];
        $uname = UserTable::where('UserName','=',$x)->firstorfail();
        $id = $uname['UserID'];
        $pics = PictureTable::where('UserID','!=',$id)->get();
        //return $pics;
         if(!$pics) {
            return response()->json(['message' => 'User Does Not Exists!!!','code' =>404],404);
        }
        $picID = [];
        foreach ($pics as $pic) {
            array_push($picID, $pic['PictureID']);           
        }
        //return $picID;
        $x = UserPicture::where('UserID','=',$id)->whereIn('PictureID',$picID)->get();
        $aid = [];
        foreach ($x as $y) {
            array_push($aid, $y['PictureID']);
        }
        $show = PictureTable::where('UserID','!=',$id)->whereNOTIN('PictureID',$aid)->get();
       //   $pics = PictureTable::where('UserID','!=',$id)->whereIN('PictureID',$picID)->get();
       //   print_r($pics);
        return response()->json(['data' => $show]);
    }
public function testgallery() {

    // $pics = PictureTable::all();
    // foreach ($pics as $pic) {
    //     echo "<img src = '/".$pic->PictureURL."' /><br>";
    echo public_path();
    }
       public function getPictures(Request $request) {

        $uid = $request['uid'];
        $ulat = $request['ulat'];
        $ulong = $request['ulong'];
        $user = \App\UserTable::find($uid);
        if(!$user){
            return response()->json(['message'=>'No Such User','code'=>404],404);
        }
        $distance = $user->distance;
        $id = $user->UserID;
        $query = PictureTable::getByDistance($ulat,$ulong,$distance,$uid);
        if(empty($query)) {
        return response()->json(['message'=>'No Image within the selected distance','code'=>404 ],404);
        }

        $ids = [];
       foreach($query as $q)
       {
          array_push($ids, $q->PictureID);
        }

         //Get the listings that match the returned ids
        $x = UserPicture::where('UserID','=',$id)->whereIn('PictureID',$ids)->get();
        $aid = [];
        foreach ($x as $y) {
            array_push($aid, $y['PictureID']);
        }
        $show = PictureTable::where('UserName','!=',$uid)->whereIN('PictureID',$ids)->whereNOTIN('PictureID',$aid)->get();

        //$results =PictureTable::whereIn('PictureID', $ids)->get();
        return response()->json(['message'=>'Success','Images'=>$show,'code'=>200],200);
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
         //print_r($uname);
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
          if(File::exists(public_path() .'/images/'.$puid)) {
            file_put_contents($path, $image);
            PictureTable::create($values);
            return response()->json(['message' => 'Successfully Added Picture','code'=>202],202);
          } else {
            mkdir(public_path() .'/images/'.$puid);
            file_put_contents($path, $image);
            PictureTable::create($values);
            return response()->json(['message' => 'Successfully Added Picture','code'=>202],202);
          }
         // echo "<img src = '/images/".$a->UserID."/".$image_name."' />";
        }
    }
    public function rating($type) {

        if($type == "beauty") {

            $pic = PictureTable::orderby('BeautyCount','DESC')->take(9)->get();
            return response()->json(['data'=>$pic,'code'=>200],200);

        }else if($type == "kreepy") {
            $pic = PictureTable::orderby('KreepCount','DESC')->take(9)->get();
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
            $user = UserTable::find($uid);
            $uname = $user->UserID;
            $userAction = new UserPicture;
            $userAction->UserID = $uname;
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
            $user = UserTable::find($uid);
            $uname = $user->UserID;
            $userAction = new UserPicture;
            $userAction->UserID = $uname;
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
            return response()->json(['message' => 'Picture Does Not Exists!!!','code' =>404],404);
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
