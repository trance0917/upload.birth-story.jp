お客様から評価をいただきました。

─────────────────────────────
[アンケートの店舗]
{{$tbl_patient->mst_maternity->name}}
[回答したお客さま]
{{$tbl_patient->line_name}}さま

[総合評価]
{{$tbl_patient->average_score}}点

─────────────────────────────

@foreach($tbl_patient->tbl_patient_reviews AS $tbl_patient_review_key => $tbl_patient_review)
[{{($tbl_patient_review_key+1)}}]{{$tbl_patient_review->mst_maternity_question->question}}
{{(String)$tbl_patient_review->score}}点
@endforeach

[レビュー]
@if($tbl_patient->tbl_user_store->review)
{{(String)$tbl_patient->tbl_user_store->review}}
@else
--
@endif

--------------------
- {{env('APP_NAME')}} -
{{url('/')}}
