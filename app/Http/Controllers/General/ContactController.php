<?php
namespace App\Http\Controllers\General;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\General\ContactRequest;

use App\Events\ContactSendEvent;

final class ContactController extends Controller
{
    public function index(Request $request){
        return view('general.contact.index');
    }

	public function confirm(ContactRequest $request){
        return view('general.contact.confirm');
	}

	public function complete(ContactRequest $request){
		if(request()->action === 'return'){
			return redirect('/contact')->withInput();
		}
//		if(env('APP_ENV')=='story'){
			request()->session()->regenerateToken();
//		}
//
        $model = \App\Models\TblContact::create($request->all());
        event(new ContactSendEvent($model));

        return view('general.contact.complete');
	}
}
