<?php
namespace App\Http\Controllers\General;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

final class WebHookController extends Controller
{
    public function index(int $mst_material_group_id,Request $request){

        return view('general.contact.index');
    }
}
