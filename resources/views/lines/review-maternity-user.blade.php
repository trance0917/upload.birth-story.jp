
{{$tbl_patient->name}}さまから評価をいただきました。
下記が内容です。

@foreach($tbl_patient->tbl_patient_reviews AS $tbl_patient_review_key => $tbl_patient_review)
[{{$tbl_patient_review_key+1}}]{{$tbl_patient_review->mst_maternity_question->question}}
{{$tbl_patient_review->score}}点

@endforeach

[平均]
{{$tbl_patient->average_score}}点

[レビュー]
{{$tbl_patient->review}}
