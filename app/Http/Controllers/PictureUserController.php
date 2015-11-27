<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserTable;
use App\PictureTable;
use App\UserPicture;
class PictureUserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {
        $user = UserTable::find($id);
        if(!$user) {
            return response()->json(['message' => 'Does Not Exists!!!','code' =>404],404);
        }
        return response()->json(['data' => $user->PictureTable]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$pid)
    {
        $user = UserTable::find($id);
        if(!$user) {
            return response()->json(['message' => 'Does Not Exists!!!','code' =>404],404);
        }
        $picture = $user->PictureTable->find($pid);
        if(!$picture) {
             return response()->json(['message' => 'Picture  Not Exists!!!','code' =>404],404);
        }
        return response()->json(['data' => $picture]);

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
        public function reportImage(Request $request)
    {
        $values = $request->all();
        $uname = $values['UserName'];
        $pid = $values['PictureID'];
        $uid = UserTable::find($uname);
        if(!$uid) {
            return response()->json(['message'=>'Invalid User','code'=>404],404);
        }
        $id = $uid->UserID;
        $pic = PictureTable::find($pid);
        if(!$pic) {
             return response()->json(['message'=>'Invalid Image','code'=>404],404);
        }
        unset($values['UserName']);
        $values['UserID'] = $id;
        $values['userAction']= '-9';
        UserPicture::create($values);
        return response()->json(['message'=>'Reported In APt for Image','code'=>202],202);

    }
}
