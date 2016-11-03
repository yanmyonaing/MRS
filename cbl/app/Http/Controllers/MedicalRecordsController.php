<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MedicalRecordsController extends Controller
{
   public function getMRS(Request $MRSRecord){
   		return 'Hello MRS';
   }

   public function getCurPK(){
        //if (session()->has('cur_user'))
            return session()->get('cur_user');                   
                
    } 
}
