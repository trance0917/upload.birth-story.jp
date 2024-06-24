<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MaternityService;
use App\Models\TblLiff;

class MaternityController extends Controller
{
    public function index(Request $request,MaternityService $maternity_service) {
        $tbl_liff = new TblLiff;
        $tbl_liff->tbl_maternity_id = $request->tbl_maternity_id;
        $tbl_liff->line_user_id = $request->line_user_id;
        $tbl_liff->save();

        //todo: 規定評価以上なら産院にメッセージを送る
        return response()->json([
            'result' => true,
            'messages' => '',
            'errors' => [],
        ]);
    }
}
