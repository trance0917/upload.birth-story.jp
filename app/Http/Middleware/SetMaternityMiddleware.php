<?php

namespace App\Http\Middleware;

use App\Models\TblPatient;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Services\LineBotService;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;

class SetMaternityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $mst_maternity_id = Cookie::get('mst_maternity_id');
        $tbl_patient = $request->route()->parameter('tbl_patient');
        if($mst_maternity_id && is_null($tbl_patient->mst_maternity_id)){
            $tbl_patient->mst_maternity_id = $mst_maternity_id;
            $tbl_patient->save();
        }


        if(!is_null($tbl_patient->mst_maternity_id)){
            $line_bot_service = new LineBotService();
            $line_bot_service->pushMessage(config('birthstory.admin_line_user_id'),new TextMessageBuilder(view('lines/error-488',
                [
                    'tbl_patient'=>$tbl_patient,
                ]
            )->render()));


            abort(488);
        }

        return $next($request);

    }
}
