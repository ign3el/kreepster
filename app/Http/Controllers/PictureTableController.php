<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PictureTable;
use App\UserPicture;
use App\Http\Requests\PictureRequest;
use DB;
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
        return response()->json(['message'=>'No Image within the selected distance','code'=>$query ],404);
        }

        $ids = [];
       foreach($query as $q)
       {
          array_push($ids, $q->PictureID);
        }

         //Get the listings that match the returned ids
        $results =PictureTable::whereIn('PictureID', $ids)->get();
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
    public function store(PictureRequest $request)
    {
        $values = $request->only(['UserID','PictureURL','Latitude','Longitude']);
        PictureTable::create($values);
        return response()->json(['message' => 'Successfully Added Picture','code'=>202],202);

    }
    public function rating($type) {

        if($type == "beauty") {

            $pic = PictureTable::orderby('BeautyCount','DESC')->find(1);
            return response()->json(['data'=>$pic,'code'=>200],200);

        }else if($type == "kreepy") {
            $pic = PictureTable::orderby('KreepCount','DESC')->find(1);
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
