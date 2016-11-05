<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Users;
use App\Models\Patient;
use App\Models\LabResult;
use App\Models\Result;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

//use JWTAuth;


class UserController extends Controller
{
    //public function __construct()
    //{
        //$this->middleware('jwt.auth', ['except' => 'index']);
    //    $this->middleware('jwt.auth');
    //}

    //public function index(){
        //$user = JWTAuth::parseToken()->authenticate();
    //	$users=Users::all();
    //	return response()->json($users);
    //}

    public function checkvalid(Request $req)
    {

        $user = Users::select('PK','name','login')->where('login',$req->input('user_id'))->where('passw', MD5($req->input('password')))->get();
        if (count($user) > 0){
            Session::put('cur_user',$user[0]->PK);
            return response()->json($user);
        }
    }

    public function logout()
    {
        //if (session()->has('cur_user'))
            session()->forget('cur_user');
    }

    public function getProfile($id)
    {
        //dd(session()->has('cur_user'));
        $user = Users::findOrFail($id);
        $user->load('patient');
        return response()->json($user);
    }

    public function changeLoginID(Request $req)
    {

            $user = Users::find($req->input('PK'));
            $user->login=$req->input('login');
            $user->save();
            $user = Users::where('PK',$req->input('PK'))->get();
            return response()->json($user);
    }  

    public function changePassword(Request $req)
    {
            $user = Users::find($req->input('PK'));
            $user->passw=MD5($req->input('password'));
            $user->save();
            $user = Users::where('PK',$req->input('PK'))->get();
            return response()->json($user);
    }

    public function patientData()
    {
        $userId = Session::get('cur_user');
        $user = Users::find($userId);
        $user->patient->get();
        return response()->json($user);
    }

    public function summaryData($userId)
    {
        $user = Users::find($userId);
        $user->load('patient.summary')->get();

        return response()->json($user);
    }

    public function labResultData($userId)
    {
        $user = Users::find($userId);
        $user->load('patient.labResult');
        return response()->json($user);
    }

    public function resultData($userId)
    {
        $user = Users::find($userId);
        $user->load('patient.labresult.result.fileresult');
        return response()->json($user);
    }

    public function fileResultData($userId)
    {
        $user = Users::find($userId);
        $user->load('patient.labResult.fileResult');
        return response()->json($user);
    }

}
