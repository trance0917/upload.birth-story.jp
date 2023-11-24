<header id="header" class="text-center pt-7.5 pb-5 md:pt-1.5 md:pb-2">

        <div class="flex justify-between items-center px-[15px]">
            <div class="w-[44px] h-[44px]"></div>
            <div class="md:pt-3 md:pb-1.5">
                <p class="w-[360px] md:w-[200px] mx-auto">
                    @if(isset($tbl_patient))
                    <a href="{{route('guide',$tbl_patient)}}"><img src="/images/logo.svg" alt="バースストーリー" /></a>
                    @else
                        <img src="/images/logo.svg" alt="バースストーリー" />
                    @endif
                </p>
                <p class="text-[#666] font-bold mt-2.5 md:mt-1.25 leading-none">バースストーリー</p>
            </div>
            @if(isset($tbl_patient))
                <div><img class="rounded-[100px] w-[44px] h-[44px]" src="{{$tbl_patient->line_picture_url}}" alt=""></div>
            @else
                <div class="w-[44px] h-[44px]"></div>
            @endif
        </div>

</header>
<p class="text-center bg-main text-white font-bold text-[14px] py-1.25">{{$tbl_patient->mst_maternity->name??'--'}}</p>

