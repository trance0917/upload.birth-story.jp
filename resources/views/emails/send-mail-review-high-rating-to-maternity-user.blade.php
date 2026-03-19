患者さまから評価をいただきました。

─────────────────────────────
[アンケートの産院]
{{$tbl_patient->mst_maternity->name}}

[回答した患者さま]
{{$tbl_patient->name}}さま

[総合評価]
{{$tbl_patient->average_score}}点

─────────────────────────────

@foreach($tbl_patient->tbl_patient_reviews AS $tbl_patient_review_key => $tbl_patient_review)
[{{($tbl_patient_review_key+1)}}]{{$tbl_patient_review->mst_maternity_question->question}}
{{(String)$tbl_patient_review->score}}点

@endforeach

[レビュー]
@if($tbl_patient->review)
{{(String)$tbl_patient->review}}
@else
--
@endif

--------------------
- {{env('APP_NAME')}} -
{{url('/')}}
