<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Users;
use App\Medels\Patients;
use App\Http\Controllers\Controller;
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

    public function checkvalid(Request $req){
        $user = Users::select('PK','name','login')->where('login',$req->input('user_id'))->where('passw', MD5($req->input('password')))->get();         

        if (count($user) > 0){
           //session()->put('cur_user',$user[0]->PK); 
           return $user;
        }            
        
    }

    public function logout(){

        //if (session()->has('cur_user'))
        

            session()->forget('cur_user');
        
    
    }

    public function getProfile($id){

        //dd(session()->has('cur_user'));
        //if (session()->has('cur_user')){ 

            $user = Users::with('Patients')->where('PK', $id)->get();
            return response()->json($user);
        //}
    }

    public function changeLoginID(Request $req){

        //if (session()->has('cur_user')){
            $user = Users::find($req->input('PK'));
            $user->login=$req->input('login');
            $user->save();
            $user = Users::where('PK',$req->input('PK'))->get();
            return response()->json($users);
        //}
    }  

    public function changePassword(Request $req){       

        //if (session()->has('cur_user')){
            $user = Users::find($req->input('PK'));
            $user->passw=MD5($req->input('password'));
            $user->save();
            $user = Users::where('PK',$req->input('PK'))->get();
            return response()->json($users);
        //}
    }       
}
