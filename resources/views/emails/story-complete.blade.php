
★★=====★★=====★★=====★★=====★★=====★★

データの提出がありました。

[産院]
{{$tbl_patient->mst_maternity->name}}

[送信日]
{{\Carbon\Carbon::now()}}

[コード番号]
{{$tbl_patient->code}}

[お名前]
{{$tbl_patient->name}}

[出産日時]
{{$tbl_patient->birth_day}}

[1ヵ月健診]
{{$tbl_patient->health_check_date}}

[データ]
@if(app()->environment('production'))
https://{{config('birthstory.zip_download_basic_username')}}:{{config('birthstory.zip_download_basic_password')}}@upload.birth-story.jp/dl/{{$tbl_patient->code}}
@else
https://{{config('birthstory.zip_download_basic_username')}}:{{config('birthstory.zip_download_basic_password')}}@dev.upload.birth-story.jp/dl/{{$tbl_patient->code}}
@endif

。.:*:・'゜☆------------------------☆。.:*:・'゜
　　　　　  DIGITAL CREATIVE DESIGN
　　　　　         ANGE　CREATE
。.:*:・'゜☆------------------------☆。.:*:・'゜
