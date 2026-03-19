@extends('layout')
@section('meta')@endsection
@section('contents')
<main id="main" class="w-[1200px] mx-auto md:w-full">
    <div class="w-[800px] mx-auto md:w-full">
        <h1 class="mt-[50px] md:mt-[30px] text-center"><span class="px-[25px] md:px-[15px] pb-[15px] pt-[18px] bg-sub-light font-bold text-[24px] md:text-[16px] inline-block leading-none">Q & A</span></h1>

        <div class="
            mt-[30px]
            space-y-[20px]
            [&>.box]:px-[20px]
            [&>.box>h2]:font-bold
            [&>.box>h2]:text-[16px]
            [&>.box>h2]:mb-[10px]

            [&>.box>dl]:space-y-[10px]
            [&>.box>dl>div]:border-slate-200
            [&>.box>dl>div]:border
            [&>.box>dl>div>dt]:p-[5px_10px]
            [&>.box>dl>div>dt]:bg-slate-100
            [&>.box>dl>div>dt]:font-bold
            [&>.box>dl>div>dt>span]:mr-[5px]
            [&>.box>dl>div>dt]:text-[14px]
            [&>.box>dl>div>.answer]:flex
            [&>.box>dl>div>.answer]:p-[5px_10px]
            [&>.box>dl>div>.answer>div]:mr-[10px]
            [&>.box>dl>div>.answer>div]:font-bold
            [&>.box>dl>div>.answer]:text-[14px]
        ">
            <div class="box">
                <h2>「バースストーリー」 について</h2>
                <dl>
                    <div>
                        <dt><span>Q-1</span>「バースストーリー」　DVD</dt>
                        <div class="answer">
                            <div>A</div>
                            <dd>お送りいただいた写真や動画で　感動フォトムービーをお作りいたします。<br />
                                DVDプレーヤーやPCでご覧いただけます。</dd>
                        </div>
                    </div>
                </dl>
            </div>

            <div class="box">
                <h2>「バースストーリー」 に使用する写真について</h2>
                <dl>
                    <div>
                        <dt><span>Q-1</span>エコー写真や名前のわかる写真がないのですが。</dt>
                        <div class="answer">
                            <div>A</div>
                            <dd>他の写真で代用いたします。<br />
                                お気に入りの写真をお送りください。全部で17枚あれば大丈夫です。</dd>
                        </div>
                    </div>
                    <div>
                        <dt><span>Q-2</span>縦向きで撮ってしまったのですが。</dt>
                        <div class="answer">
                            <div>A</div>
                            <dd>左右に黒い背景ができてしまいます。<br />
                                また　トリミングして画質が低下する場合もございますので<br />
                                できるだけ横向き写真でお願いします。</dd>
                        </div>
                    </div>
                    <div>
                        <dt><span>Q-3</span>全体的に暗い写真ですが・・。</dt>
                        <div class="answer">
                            <div>A</div>
                            <dd>こちらで　色補正いたしますので撮ったままのデータをお送りください。<br />
                                アプリで加工などもしないようにしてください。</dd>
                        </div>
                    </div>
                </dl>
            </div>

            <div class="box">
                <h2>動画について</h2>
                <dl>
                    <div>
                        <dt><span>Q-1</span>動画は必要ですか？</dt>
                        <div class="answer">
                            <div>A</div>
                            <dd>動画の挿入は自由選択ですが　素敵な記念になりますので是非お入れください。<br />
                                できるだけ　25秒～30秒以内でお願いいたします。<br />
                                超えますと　こちらでカットさせていただきますのでご了承ください。</dd>
                        </div>
                    </div>
                    <div>
                        <dt><span>Q-2</span>どのような動画がいいですか？</dt>
                        <div class="answer">
                            <div>A</div>
                            <dd>生まれて間もない映像や、パパママやお兄ちゃんお姉ちゃんからのメッセージ映像などなど是非残したい動画お送りください。</dd>
                        </div>
                    </div>
                    <div>
                        <dt><span>Q-3</span>泣き声の入った動画とは？</dt>
                        <div class="answer">
                            <div>A</div>
                            <dd>動画から泣き声の部分を抽出して映像のバックに流します。<br />
                                生まれた瞬間の産声でなくてもOKです。</dd>
                        </div>
                    </div>
                </dl>
            </div>

{{--            <div class="box">--}}
{{--                <h2>「ふぉとあーと」 について</h2>--}}
{{--                <dl>--}}
{{--                    <div>--}}
{{--                        <dt><span>Q-1</span>「ふぉとあーと」とは？</dt>--}}
{{--                        <div class="answer">--}}
{{--                            <div>A</div>--}}
{{--                            <dd>カメラマン不要の安心安全なニューボーンフォトです。<br />--}}
{{--                                お送りいただいた写真をコラージュして　プロ撮影風に仕上げます。--}}
{{--                            </dd>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <dt><span>Q-2</span>どのような写真がいいですか？</dt>--}}
{{--                        <div class="answer">--}}
{{--                            <div>A</div>--}}
{{--                            <dd>夜間ではなく日中の明るい光の中で　全身（必ず頭から足まで）を正面からお撮りください。<br />--}}
{{--                                下は、無地のシーツかタオルを敷いてください。</dd>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <dt><span>Q-3</span>泣いて動き回るのですが。</dt>--}}
{{--                        <div class="answer">--}}
{{--                            <div>A</div>--}}
{{--                            <dd>授乳後　お腹がいっぱいになると落ち着いて寝てくれます。<br />--}}
{{--                                授乳枕などで凹みを作ってのせると安定しますので　ゆっくりと落ち着いてお撮りください。</dd>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </dl>--}}
{{--            </div>--}}

            <div class="box">
                <h2>データについて</h2>
                <dl>
                    <div>
                        <dt><span>Q-1</span>スマホで観たり　遠く離れた両親にも観せたいです。</dt>
                        <div class="answer">
                            <div>A</div>
                            <dd>LINEに動画をお送りいたします。<br />
                            親しい方に送ったり、スマホやタブレットでいつでも見返すことができます。</dd>
                        </div>
                    </div>
                    <div>
                        <dt><span>Q-2</span>プリント写真のデータが欲しいです。</dt>
                        <div class="answer">
                            <div>A</div>
                            <dd>1ヵ月健診の夜、LINEに写真データをお送りいたします。<br />
                            待ち受けにしたり、大きくプリントしてお楽しみください。</dd>
                        </div>
                    </div>
                </dl>
            </div>

        </div>


    </div>
</main>
@endsection

@section('javascript')@endsection
