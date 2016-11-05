<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient; 
use App\Models\Users;

use App\Http\Requests;

class PatientController extends Controller
{
     public function index(){
         //$user = JWTAuth::parseToken()->authenticate();
     	$patients=Patient::with('users')->with('summary')->with('labResult')->get();

         return response()->json($patients);
     }
    
    public function details($id)
    {
        $patient = Patient::findOrFail($id);

        $patient->load('summary');

        return response()->json($patient);
    }
}
