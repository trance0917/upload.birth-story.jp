@extends('layout')
@section('meta')@endsection
@section('contents')
<main id="main" class="w-[1200px] mx-auto md:w-full">
    <div class="w-[800px] mx-auto md:w-full">
        <h1 class="mt-[50px] md:mt-[30px] text-center"><span class="px-[25px] md:px-[20px] pb-[20px] pt-[23px] bg-green text-white font-bold text-[24px] md:text-[16px] inline-block leading-none">このデータは下記の内容で提出済みです</span></h1>
    </div>


    <div class="mt-[50px] md:mt-[30px] flex justify-center">
        <div class="inline-block">
            <div class="flex justify-center items-center bg-sub-light px-[40px] md:px-[20px] py-[30px] md:py-[15px]">
                <img class="w-[52px] md:w-[26px] min-w-[52px] md:min-w-[26px] mr-[20px] md:mr-[10px]" src="/images/icon-finger.png" alt="">
                <p class="text-red font-bold text-[16px] md:text-[12px]">途中での保存が可能です。<br />空き時間に少しづつ進めてください。</p>
            </div>
        </div>
    </div>

    <p class="text-center font-bold text-red text-[16px] md:text-[12px] mt-[40px] md:mt-[20px]">保存コード：<span class="text-[20px] md:text-[16px] text-red">il 972 518</span></p>

    <div class="bg-[#F5F5F5] mt-[40px] md:mt-[20px] w-[500px] md:w-[350px] mx-auto px-[20px] py-[20px] flex-col flex items-center">
        <p class="font-bold text-center text-[18px] md:text-[14px]">既に保存コードをお持ちの方</p>
        <ul class="flex justify-center mt-[10px]">
            <li><input class="h-[30px]" type="text" value="" /></li>
            <li><button class="submit font-bold text-center w-[50px] bg-main text-white text-[16px] md:text-[14px] h-[30px]">復元</button></li>
        </ul>
        <p class="font-bold text-red text-center text-[16px] md:text-[12px] mt-[5px]">復元データが存在しませんでした。</p>
        <p class="text-[14px] md:text-[12px] text-[#666666] mt-[10px]">以前のコード番号を入力することで過去に途中で保存した<br class="md:hidden" />データを復元できます。</p>
    </div>

    <ul class="flex justify-center mt-[30px] md:mt-[20px] space-x-[10px]
    [&>li>a]:block
    [&>li>a]:w-[200px] md:[&>li>a]:w-[140px]
    [&>li>a]:text-center
    [&>li>a]:bg-[#999999]
    [&>li>a]:font-bold
    [&>li>a]:text-white
    [&>li>a]:text-[16px] md:[&>li>a]:text-[14px]
    [&>li>a]:py-[13px] md:[&>li>a]:py-[10px]
    [&>li>a]:rounded-sm


    ">
        <li><a href="/contact">お問い合わせ</a></li>
        <li><a href="/faq">よくある質問</a></li>
    </ul>


    <section class="mx-auto w-[800px] md:w-auto mt-[50px] md:mt-[25px]">
        <h3 class="bg-main text-white font-bold py-[15px] text-[18px] pl-[20px] flex items-center"><i class="fa-solid fa-pencil mr-[8px] md:mr-[5px]"></i>ご出産情報を入力<span class="py-[2px] ml-[5px] inline-block w-[50px] bg-red font-bold text-[14px] text-center text-white">必須</span></h3>
        <div class="
        space-y-[20px]
        mx-[20px] py-[15px]
        [&_h4]:text-brown
        [&_h4]:text-[18px]
        [&_h4]:font-bold
        [&_h4>i]:mr-[8px] md:[&_h4>i]:mr-[5px]

        [&_.box]:mt-[10px]
        [&_.box]:space-y-[10px]
        [&_.box>.item]:flex
        [&_.box>.item>dt]:w-[120px]
        [&_.box>.item>dt]:h-[30px]
        [&_.box>.item>dt]:leading-[30px]
        [&_.box>.item]:text-[14px]
        [&_.box>.item>dd_.txt]:h-[30px]

        [&_.box>.item>dd_.complement]:text-[12px]
        [&_.box>.item>dd_.complement]:text-[#666]
        [&_.box>.item>dd_.complement]:font-bold
        [&_.box>.item>dd_.complement]:leading-none
        [&_.box>.item>dd_.unit]:ml-[3px]
        [&_.box>.item>dd]:flex-grow
">
            <div class="outer">
                <h4><i class="fa-solid fa-pencil"></i>ママの情報</h4>
                <dl class="box">
                   <div class="item">
                       <dt class="!h-[1.4em] !leading-[1.4em]">産院名</dt>
                       <dd class="!h-[1.4em] !leading-[1.4em] font-bold">{{env('MATERNITY_NAME')}}</dd>
                   </div>
                    <div class="item">
                        <dt>ママのお名前</dt>
                        <dd><input class="txt w-[150px]" type="text" value="" placeholder="例：山田 花子" /></dd>
                    </div>
                    <div class="item">
                        <dt>ローマ字表記</dt>
                        <dd><input class="txt w-[190px]" type="text" value="" placeholder="例：YAMADA HANAKO" /><br />
                            <span class="complement">※ 大文字または小文字</span>
                        </dd>
                    </div>
                    <div class="item">
                        <dt>電話番号</dt>
                        <dd><input class="txt w-[130px]" type="tel" value="" placeholder="例：08012345678" /><br />
                        <span class="complement">※ ハイフン不要</span>
                        </dd>
                    </div><div class="item">
                        <dt>メールアドレス</dt>
                        <dd><input class="txt w-[210px]" type="email" value="" placeholder="例：info@birth-story.jp" /></dd>
                    </div>
                </dl>
            </div>

            <div class="outer">
                <h4><i class="fa-solid fa-pencil"></i>ベビーの情報</h4>
                <dl class="box">
                    <div class="item">
                        <dt>お名前</dt>
                        <dd><input class="txt w-[110px]" type="text" value="" placeholder="例：花子" /><br />
                            <span class="complement">※ 未記入可</span>
                            <span class="block text-red font-bold text-[12px]">※ 入力してください</span>
                        </dd>
                    </div>
                    <div class="item">
                        <dt>ローマ字表記</dt>
                        <dd><input class="txt w-[140px]" type="text" value="" placeholder="例：HANAKO" /><br />
                            <span class="complement">※ 未記入可</span>
                        </dd>
                    </div>
                    <div class="item">
                        <dt>生まれた日</dt>
                        <dd><input class="txt w-[120px]" type="date" value="" placeholder="年 / 月 / 日" />
                        </dd>
                    </div>
                    <div class="item">
                        <dt>生まれた時刻</dt>
                        <dd><input class="txt w-[100px]" type="time" value="" placeholder="--:--" />
                        </dd>
                    </div>
                    <div class="item">
                        <dt>体重</dt>
                        <dd><input class="txt w-[80px]" type="number" value="" /><span class="unit">g</span></dd>
                    </div>
                    <div class="item">
                        <dt>身長</dt>
                        <dd><input class="txt w-[70px]" type="number" value="" /><span class="unit">cm</span>
                            <span class="block text-red font-bold text-[12px]">※ 入力してください</span></dd>
                    </div>
                    <div class="item">
                        <dt>性別</dt>
                        <dd><select class="w-[60px]" name="">
                                <option value="">--</option>

                            </select>
                            <span class="unite ml-[10px]">第</span>
                            <select class="w-[60px]" name="">
                                <option value="">--</option>

                            </select>
                            <span class="unite">子</span>
                            <span class="block text-red font-bold text-[12px]">※ 入力してください</span>
                        </dd>
                    </div>
                </dl>
            </div>

            <div class="outer">
                <h4><i class="fa-solid fa-pencil"></i>確認事項</h4>
                <dl class="box">
                    <div class="item">
                        <dt>1ヶ月健診日</dt>
                        <dd><input type="date" value="" placeholder="例：YAMADA HANAKO" />
                            <span class="block text-red font-bold text-[12px]">※ 入力してください</span>
                        </dd>
                    </div>
                    <div class="item">
                        <dt>備考</dt>
                        <dd><textarea class="w-full" name="" rows="4" placeholder="伝えておきたいことなど"></textarea></dd>
                    </div>
                    <div class="item pt-[10px]">
                        <dd>
                            <div class="text-center text-[12px] font-bold">ベビー写真を色補正してインスタグラムに<br />
                            掲載することがあります。</div>
                            <ul class="flex space-x-[15px] mt-[5px] justify-center">
                                <li><label class="flex items-center"><input class="mr-[3px]" type="radio" name="a">許可する</label></li>
                                <li><label class="flex items-center"><input class="mr-[3px]" type="radio" name="a">許可しない</label></li>
                            </ul>
                            <div class="text-center mt-[15px]"><a class="text-main underline" href="https://www.instagram.com/birthstory.jp/" target="_blank">BIRTH STORY公式インスタはこちら</a></div>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <section class="mx-auto w-[800px] md:w-auto mt-[50px] md:mt-[25px]">
        <h3 class="bg-main text-white font-bold py-[15px] text-[18px] pl-[20px] flex items-center"><i class="fa-solid fa-pencil mr-[8px] md:mr-[5px]"></i>お写真を登録<span class="py-[2px] ml-[5px] inline-block w-[50px] bg-red font-bold text-[14px] text-center text-white">必須</span></h3>
        <div class="mx-[20px] py-[15px]
        [&_h4]:text-brown
        [&_h4]:text-[18px]
        [&_h4]:font-bold
        [&_h4>i]:mr-[8px] md:[&_h4>i]:mr-[5px]
        [&_h4>.count]:ml-[3px]
        [&_h4>.count]:text-red
        [&_h4>.example]:text-[14px]
        [&_h4>.example]:text-[#666]
        [&_h4>.example]:underline
        [&_h4>.example]:ml-[3px]
        ">
            <div class="flex justify-center">
                <div class="inline-block">
                    <div class="flex justify-center items-center bg-sub-light px-[30px] md:px-[15px] py-[20px] md:py-[10px]">
                        <img class="w-[52px] md:w-[26px] min-w-[52px] md:min-w-[26px] mr-[20px] md:mr-[10px]" src="/images/icon-finger.png" alt="">
                        <p class="text-red font-bold text-[14px] md:text-[10px] leading-tight">・横のアングル写真〇 縦のアングル×<br />
                            ・指定の写真がない場合は、他の写真でも可<br />
                            ・逆さまの写真でも編集時に対応します<br />
                            ・写真サイズは大きめのものをアップロードしてください<br />
                            ・アプリなどで加工された写真だと画質が荒くなります</p>
                    </div>
                </div>
            </div>


            <div>
                <h4><i class="fa-solid fa-pencil"></i>エコー写真<span class="count">2枚</span><span class="example">写真例</span></h4>
                <div class="box"></div>
            </div>

            <div>
                <h4><i class="fa-solid fa-pencil"></i>ネームカード<span class="font-normal text-[#999] text-[14px]">(お名前が分かるもの)</span><span class="example">写真例</span></h4>
                <div class="box"></div>
            </div>

            <div>
                <h4><i class="fa-solid fa-pencil"></i>出産前・出産中・出産直後<span class="count">6枚</span><span class="example">写真例</span></h4>
                <p class="text-red font-bold text-[14px] leading-none">※ 表示順に作成されます</p>
                <div class="box"></div>
            </div>

            <div>
                <h4><i class="fa-solid fa-pencil"></i>ご自由にお好きなシーン<span class="count">8枚</span><span class="example">写真例</span></h4>
                <div class="box"></div>
            </div>

            <div>
                <h4><i class="fa-solid fa-pencil"></i>フォトアートにしたい写真を<span class="count">3枚</span><span class="example">写真例</span></h4>
                <p class="text-red font-bold text-[14px] leading-none">※ この中から1枚選んで「ふぉとあーと」にいたします</p>
                <div class="box"></div>
            </div>

        </div>
    </section>

    <section class="mx-auto w-[800px] md:w-auto mt-[50px] md:mt-[25px]">
        <h3 class="bg-main text-white font-bold py-[15px] text-[18px] pl-[20px] flex items-center"><i class="fa-solid fa-pencil mr-[8px] md:mr-[5px]"></i>産声・動画の登録<span class="py-[2px] ml-[5px] inline-block w-[50px] bg-green font-bold text-[14px] text-center text-white">任意</span></h3>
        <div class="mx-[20px] py-[15px]">

            入れたい産声
            動画(横アングル)
            ※ 動画は20秒前後でお願いします。


        </div>
    </section>

    <p class="mt-[50px] md:mt-[30px] w-[340px] md:w-[240px] mx-auto text-center"><button type="submit" value="1" class="relative w-full block bg-green text-white font-bold py-[20px] md:py-[15px] rounded-sm text-[22px] md:text-[16px]" href="/production">確認画面へ<i class="fa-solid fa-angle-right absolute top-[26px] md:top-[18px] right-[15px]"></i></button></p>

    <i class="fa-regular fa-image"></i>
    <i class="fa-solid fa-film"></i>
    <button class="block w-full fixed bottom-0 left-0 text-16px] py-[15px] font-bold text-white bg-[#999]" type="submit" value="2"><i class="fa-solid fa-download mr-[5px]"></i> 途中保存する</button>
</main>
@endsection

@section('javascript')@endsection
