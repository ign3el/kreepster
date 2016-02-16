<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
use Input;
use File;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "IN INDEX!!";
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
    public function allImages() {

       $images = \App\PictureTable::select()->paginate(10);
       return view('admin.UserPics.index',compact('images'));

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

        public function allInaptImages() {

        $images = \App\UserPicture::where('userAction','=','-9')->paginate(10);
        foreach($images as $image) {
            $uid = \App\UserTable::whereUserid($image->UserID)->FirstorFail();
            $image['MarkedBy'] = $uid->UserName;
            $pic = \App\PictureTable::wherePictureid($image->PictureID)->FirstorFail();
            $image['PictureURL'] = $pic->PictureURL;
            $image['BeautyCount'] = $pic->BeautyCount;
            $image['KreepCount'] = $pic->KreepCount;
            $image['UserName'] = $pic->UserName;

       }
       return view('admin.UserPics.allinaptimages',compact('images'));
    }

    public function topBeauty() {
               $images = \App\PictureTable::orderby('BeautyCount','DESC')->take(10)->get();
               foreach($images as $image) {
                $uid = \App\UserTable::whereUserid($image->UserID)->FirstorFail();
                $image['PostedBy'] = $uid->UserName;
                //echo $uid->FirsName;
       }
       //print_r($images);
       return view('admin.UserPics.topBeauty',compact('images'));

    }

        public function topKreepy() {
               $images = \App\PictureTable::orderby('KreepCount','DESC')->take(10)->get();
               foreach($images as $image) {
                $uid = \App\UserTable::whereUserid($image->UserID)->FirstorFail();
                $image['PostedBy'] = $uid->UserName;
                //echo $uid->FirsName;
       }
       //print_r($images);
       return view('admin.UserPics.topKreepy',compact('images'));

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $pic = \App\PictureTable::wherePictureid($id)->firstorfail();
        if(File::exists($pic->PictureURL)) {
            if(File::delete($pic->PictureURL)) {
                echo "SUCCESS!!!";
                $pic->delete();
                $actionPics = \App\UserPicture::where('PictureID','=',$id)->delete();
                if(!$actionPics) {
                    return Redirect::to(Session()->get('backUrl'))->with('status', 'ERROR Deleted Image on Other Tables'); 
                }
                return Redirect::to(Session()->get('backUrl'))->with('status', 'Successfully Deleted Image'); 
            }else {
                return Redirect::to(Session()->get('backUrl'))->with('status', 'Error Deleting Image'); 
            }
        } else {
            return Redirect::to(Session()->get('backUrl'))->with('status', 'File Does Not Exists!!'); 
        }
    }
}