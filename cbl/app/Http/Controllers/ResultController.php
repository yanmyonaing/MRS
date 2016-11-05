<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Patient;
use App\Models\Summary;
use App\Models\Result;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class ResultController extends Controller
{

    public function index(){
        //$user = JWTAuth::parseToken()->authenticate();
        $result = Result::with('labResult')->with('fileresult')->get();

        return response()->json($result);
    }

    public function details($id)
    {
        $result = Result::findOrFail($id);

        $result->load('fileresult');

        return response()->json($result);
    }

}
