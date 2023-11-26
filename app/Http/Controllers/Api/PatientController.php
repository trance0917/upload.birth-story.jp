<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MstMaternityQuestion;
use App\Models\TblPatient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Cache;
use App\Services\ReviewService;

class PatientController extends Controller
{
    public function storeReview(Request $request) {
        dump($request->all());
        sleep(1);
        return response()->json([
            'messages' => '',
            'result' => '',
        ]);
    }
}
