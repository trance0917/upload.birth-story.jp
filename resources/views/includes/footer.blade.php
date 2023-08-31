<footer id="footer" class="bg-[#AAAAAA] mt-30 pt-10 pb-2.5">

    @if(Request::route()->getName()!='toppage')<p class="mb-7.5 text-center"><a class="bg-[#fff] rounded inline-block pt-1 pb-0.5 px-2" href="/contact">お問い合わせ</a></p>@endif
    <small class="block text-[14px] text-white text-center">©BIRTH-STORY {{\Carbon\Carbon::now()->year}}.</small>
</footer>

