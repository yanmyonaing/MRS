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

class SummaryController extends Controller
{

    public function index(){
        //$user = JWTAuth::parseToken()->authenticate();
        $summary = Summary::with('users')->with('summary')->with('labResult')->get();

        return response()->json($summary);
    }

    public function details($id)
    {
        $summary = Summary::findOrFail($id);

        $summary->load('patient');

        return response()->json($summary);
    }

}
