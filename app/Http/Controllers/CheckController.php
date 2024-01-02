<?php

namespace App\Http\Controllers;

use App\Models\TblPatient;
use App\Services\LineBotService;
use App\Services\PatientService;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function index(TblPatient $tbl_patient,Request $request,PatientService $patient_service){

        $line_bot_service = new LineBotService();
        $richmenus = $line_bot_service->getRichMenuList()->getJSONDecodedBody()['richmenus'];

        foreach($richmenus AS $richmenu){
            $model = TblPatient::where('richmenu_id',$richmenu['richMenuId'])->first();
            if(!$model){
                $line_bot_service->deleteRichMenu($richmenu['richMenuId']);
            }
        }

        return view('general.check.index',compact('tbl_patient'));
    }
}
