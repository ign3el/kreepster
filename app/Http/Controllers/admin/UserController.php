<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Validator;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function search(Request $request) {
         $name = $request['stext'];
         $users = \App\UserTable::where('FirstName', 'LIKE', '%'.$name.'%')->Paginate(5);
         $colName = DB::select(" SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'UserTables';");
         return view('admin.users',compact('users','colName'));
         
     }
    public function index()
    {
        $users = \App\UserTable::paginate(5);
        $colName = DB::select(" SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'UserTables';");
        
        return view('admin.users',compact('users','colName'));
    }
    public function pics($id) {
        $images = \App\UserPicture::where('UserId','=',$id)->orderBy('UserId', 'asc')->paginate(5);
        $user = \App\UserTable::whereUserid($id)->firstorfail();
        return view('admin.UserPics.showUserPics', compact('images','user'));
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
    public function show($id)
    {
        $user = \App\UserTable::whereUsername($id)->first();
        $colName = DB::select(" SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'UserTables';");
        return view('admin.showUser',compact('user','colName'));
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
         $user = \App\tbl_User::whereUserid($id)->first();
         if($user->IsUserActive){
              $user->IsUserActive = 0;  
         } else {
              $user->IsUserActive = 1; 
         }
        $user->save();
        return Redirect::back()->with('status', 'Updated Succesful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\tbl_User::whereUserid($id)->first();
        $user->delete();
        $url = Session()->get('backUrl');
       return Redirect::to(Session()->get('backUrl'))->with('status', 'Successfully Deleted User : '.$id); 
    }
}
