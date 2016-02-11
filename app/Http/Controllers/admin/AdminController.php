<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;
use App\Http\Requests\AdminFormRequest;
use App\Http\Requests\ChangePwdFormRequest;
use Validator;
use Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                return view('admin.admins');
    }
	public function admin() {
		return view('admin.admins');
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
	 public function changepwd($userName) {
		 $admin = \App\tbl_Admin::whereUsername($userName)->first();
		 return view('admin.changepwd',compact('admin'));
	 }
    public function show($userName)
    {
        $admin = \App\tbl_Admin::whereUsername($userName)->first();
		$colName = DB::select(" SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'tbl_Admins';");
		return view('admin.showAdmin',compact('admin','colName'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ChangePwdFormRequest $request , $userName)
    {
         $admin = \App\tbl_Admin::whereUsername($userName)->first();
		 $admin->password = Hash::make($request->get('password'));
		 $admin->save();
		    $url = Session()->get('adminurl');
	   return Redirect::to(Session()->get('adminurl'))->with('status', 'Successfully Changed Password!!'); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminFormRequest $request, $id)
    {
        $admin = \App\tbl_Admin::whereUsername($id)->firstOrFail();
		$admin->remember_token = $request->get('remember_token');
		$admin->FirstName = $request->get('FirstName');
		$admin->MiddleName = $request->get('MiddleName');
		$admin->LastName = $request->get('LastName');
		$admin->lastUpdatedBy = Auth::user()->FirstName;
		$res = $admin->save();
		return Redirect::back()->with('status', 'Updated Succesful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 protected function validator(array $data)
    {
        return Validator::make($data, [
            'userName' => 'required|max:255|unique:users',
            'email' => 'email|max:255|unique:users',
			'FirstName' => 'required|max:25',
			'LastName' => 'max:25',
            'password' => 'required|confirmed|min:6',
        ]);
    }
	 public function getRegister()
    {
        return view('admin.register');
    }
	public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
		\App\User::create([
            'username' => $request['userName'],
            'name' => $request['FirstName'],
			//'LastName' => $request['LastName'],
			'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

       // Auth::login($this->create($request->all()));
 $url = Session()->get('backUrl');
	   
	   return Redirect::to(Session()->get('backUrl'))->with('status', 'Successfully Added Admin : '.$request['userName']); 
    }
    public function destroy($id)
    {
       $user = Auth::user();
	   if($user->userName == $id) {
		   return Redirect::to(Session()->get('backUrl'))->with('status', 'You are Logged in With This Admin ID. Change ID to Delete This Admin Account!!'); 
	   } else {
		DB::table('tbl_Admins')->where('userName', '=', $id)->delete();
	   return Redirect::to(Session()->get('backUrl'))->with('status', 'Successfully Deleted Admin : '.$id); 
	   }
    }
}
