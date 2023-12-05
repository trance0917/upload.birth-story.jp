<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Services\MaternityLineBotService;
use App\Services\MaternityService;
use App\Services\PatientService;
use Illuminate\Http\Request;
use App\Models\TblPatient;
use App\Models\TblPatientReview;
use App\Models\MstMaternityQuestion;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\FlexMessageBuilder;
use LINE\LINEBot\RichMenuBuilder;
use LINE\LINEBot\RichMenuBuilder\RichMenuSizeBuilder;
use LINE\LINEBot\RichMenuBuilder\RichMenuAreaBuilder;
use LINE\LINEBot\RichMenuBuilder\RichMenuAreaBoundsBuilder;

use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;

class CheckController extends Controller
{
    public function index(TblPatient $tbl_patient,Request $request,PatientService $patient_service){


//        $maternity_line_bot_service = new MaternityLineBotService($tbl_patient->mst_maternity);


//        $d = $maternity_line_bot_service->getRichMenuList()->getJSONDecodedBody();
//        foreach($d['richmenus'] AS $key=>$val){
//
//            $maternity_line_bot_service->deleteRichMenu($val['richMenuId']);
//
//        }

//        dump($maternity_line_bot_service->getRichMenuList()->getJSONDecodedBody());

        return view('general.check.index',compact('tbl_patient'));
    }
}
