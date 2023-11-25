<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TblPatient;

class StoryController extends Controller
{
    public function index(TblPatient $tbl_patient,Request $request){
        return view('general.story.index',compact('tbl_patient'));
    }
}
