@extends('layout')
@section('meta')@endsection
@section('contents')
<main id="main" class="w-[1200px] mx-auto md:w-full">
    <div class="w-[800px] mx-auto md:w-full">
        <h1 class="mt-[50px] md:mt-[30px] text-center"><span class="px-[20px] md:px-[17px] py-[17px] md:py-[12px] border-2 border-green bg-white text-green font-bold text-[20px] md:text-[16px] inline-block leading-none">このデータは下記の内容で提出済みです</span></h1>
    </div>


    <div class="mt-[40px] md:mt-[20px] flex justify-center">
        <div class="inline-block">
            <div class="flex justify-center items-center bg-sub-light px-[40px] md:px-[20px] py-[30px] md:py-[15px]">
                <img class="w-[52px] md:w-[26px] min-w-[52px] md:min-w-[26px] mr-[20px] md:mr-[10px]" src="/images/icon-finger.png" alt="">
                <p class="text-red font-bold text-[16px] md:text-[12px]">途中での保存が可能です。<br />空き時間に少しづつ進めてください。</p>
            </div>
        </div>
    </div>

{{--    <p class="text-center font-bold text-red text-[16px] md:text-[12px] mt-[40px] md:mt-[20px]">保存コード：<span class="text-[20px] md:text-[16px] text-red">il 972 518</span></p>--}}

{{--    <div class="bg-[#F5F5F5] mt-[40px] md:mt-[20px] w-[500px] md:w-[350px] mx-auto px-[20px] py-[20px] flex-col flex items-center">--}}
{{--        <p class="font-bold text-center text-[18px] md:text-[14px]">既に保存コードをお持ちの方</p>--}}
{{--        <ul class="flex justify-center mt-[10px]">--}}
{{--            <li><input class="h-[30px]" type="text" value="" /></li>--}}
{{--            <li><button class="submit font-bold text-center w-[50px] bg-main text-white text-[16px] md:text-[14px] h-[30px]">復元</button></li>--}}
{{--        </ul>--}}
{{--        <p class="font-bold text-red text-center text-[16px] md:text-[12px] mt-[5px]">復元データが存在しませんでした。</p>--}}
{{--        <p class="text-[14px] md:text-[12px] text-[#666666] mt-[10px]">以前のコード番号を入力することで過去に途中で保存した<br class="md:hidden" />データを復元できます。</p>--}}
{{--    </div>--}}

    <p class="text-center font-bold mt-[30px] md:mt-[20px]">ご不明点やご質問は</p>
    <ul class="flex justify-center mt-[5px] space-x-[10px]
    [&>li>a]:block
    [&>li>a]:w-[200px] md:[&>li>a]:w-[140px]
    [&>li>a]:text-center
    [&>li>a]:font-bold
    [&>li>a]:text-white
    [&>li>a]:text-[16px] md:[&>li>a]:text-[14px]
    [&>li>a]:py-[13px] md:[&>li>a]:py-[10px]
    [&>li>a]:rounded-sm

    ">
        <li><a class="bg-[#00B900]" href="/contact">LINEお問い合わせ</a></li>
        <li><a class="bg-slate-400" href="/faq">よくある質問</a></li>
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
        [&_.box>.item>dt]:h-[34px]
        [&_.box>.item>dt]:leading-[34px]
        [&_.box>.item]:text-[14px]
        [&_.box>.item>dd_.txt]:h-[34px]

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
                       <dd class="!h-[1.4em] !leading-[1.4em] font-bold">--</dd>
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
                        <dd><select class="txt w-[60px]" name="">
                                <option value="">--</option>

                            </select>
                            <span class="unite ml-[10px]">第</span>
                            <select class="txt w-[60px]" name="">
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
                                <li><input class="mr-[3px]" name="a" type="radio" id="a"><label for="a" class="flex items-center">許可する</label></li>
                                <li><input class="mr-[3px]" name="a" type="radio" id="b"><label for="b" class="flex items-center">許可しない</label></li>
                            </ul>
                            <div class="text-center mt-[20px]"><a class="text-main underline" href="https://www.instagram.com/birthstory.jp/" target="_blank">BIRTH STORY公式インスタはこちら</a></div>
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




        [&_.box_.lbl_.not-choice]:bg-slate-100

        [&_.box_.lbl_.not-choice]:text-[16px]
        [&_.box_.lbl_.not-choice]:block
        [&_.box_.lbl_.not-choice]:text-center
        [&_.box_.lbl_.not-choice]:border
        [&_.box_.lbl_.not-choice]:border-dashed
        [&_.box_.lbl_.not-choice]:border-slate-300

        [&_.box_.lbl_div]:text-slate-400



        ">
            <div class="flex justify-center mb-[30px]">
                <div class="inline-block">
                    <div class="flex justify-center items-center bg-sub-light px-[30px] md:px-[15px] py-[20px] md:py-[10px]">
                        <img class="w-[52px] md:hidden min-w-[52px] mr-[20px] md:mr-[10px]" src="/images/icon-finger.png" alt="">
                        <p class="text-red font-bold text-[14px] md:text-[12px] leading-tight">・横のアングル写真〇　縦のアングル×<br />
                            ・指定の写真がない場合は、他の写真でも可<br />
                            ・逆さまの写真でも編集時に対応します<br />
                            ・写真サイズは大きめのものをアップロードしてください<br />
                            ・アプリなどで加工された写真だと画質が荒くなります</p>
                    </div>
                </div>
            </div>


            <div class="space-y-[25px]">
                <div class="box">
                    <h4 class="mb-[10px]"><i class="fa-solid fa-pencil"></i>エコー写真<span class="count">2枚</span><span class="example">写真例</span></h4>
                    <div class="flex justify-between flex-wrap">
                        <template v-for="(medium,medium_key) in tbl_.mediums">
                        <div v-if="medium.type=='echo'" class="w-[48.5%]">
                            <div class="">
                                <label class="lbl" :for="'medium_'+medium_key">
                                    <div class="choice"><img :src="medium.src" alt="" /></div>
                                    <div class="not-choice py-[40px]" v-if="medium.status==''">画像を選択</div>
                                </label>
                                <div v-if="medium.status=='unsaved'" class="text-center mt-[3px] py-[2px] bg-slate-400 text-white text-[12px]">未保存</div>
                                <div v-if="medium.status=='saved'" class="text-center mt-[3px] py-[2px] bg-green text-white text-[12px]">保存済(変更可)</div>
                                <input :id="'medium_'+medium_key" type="file" :name="'medium_'+medium_key" accept="image/*" />
                            </div>
                        </div>
                        </template>
                    </div>
                </div>

                <div class="box">
                    <h4 class="mb-[10px]"><i class="fa-solid fa-pencil"></i>ネームカード<span class="font-normal text-[#999] text-[14px]">(お名前が分かるもの)</span><span class="example">写真例</span></h4>
                    <div class="">
                        <template v-for="(medium,medium_key) in tbl_.mediums">
                            <div v-if="medium.type=='namecard'" class="w-[80%]">
                                <div class="">
                                    <label class="lbl" :for="'medium_'+medium_key">
                                        <div class="choice"><img :src="medium.src" alt="" /></div>
                                        <div class="not-choice py-[70px]" v-if="medium.status==''">画像を選択</div>
                                    </label>
                                    <div v-if="medium.status=='unsaved'" class="text-center mt-[3px] py-[2px] bg-slate-400 text-white text-[12px]">未保存</div>
                                    <div v-if="medium.status=='saved'" class="text-center mt-[3px] py-[2px] bg-green text-white text-[12px]">保存済(変更可)</div>
                                    <input :id="'medium_'+medium_key" type="file" :name="'medium_'+medium_key" accept="image/*" />
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <div class="box">
                    <h4><i class="fa-solid fa-pencil"></i>出産前・出産中・出産直後<span class="count">6枚</span><span class="example">写真例</span></h4>
                    <p class="text-red font-bold text-[14px] leading-none mb-[10px]">※ 表示順に作成されます</p>
                    <div class="space-y-[10px]">
                        <template v-for="(medium,medium_key) in tbl_.mediums">
                            <div v-if="medium.type=='pregnancy'" class="
                                [&_.sort-btns_li:first-child]:first:hidden
                                [&_.sort-btns_li:last-child]:last:hidden
                            ">
                                <div class="flex items-center">
                                    <div class="w-[65%]">
                                        <label class="lbl" :for="'medium_'+medium_key">
                                            <div class="choice"><img :src="medium.src" alt="" /></div>
                                            <div class="not-choice py-[50px]" v-if="medium.status==''">画像を選択</div>
                                        </label>
                                        <div v-if="medium.status=='unsaved'" class="text-center mt-[3px] py-[2px] bg-slate-400 text-white text-[12px]">未保存</div>
                                        <div v-if="medium.status=='saved'" class="text-center mt-[3px] py-[2px] bg-green text-white text-[12px]">保存済(変更可)</div>
                                        <input :id="'medium_'+medium_key" type="file" :name="'medium_'+medium_key" accept="image/*" />
                                    </div>
                                    <ul class="sort-btns ml-[10px] space-y-[5px]
                                        [&>li]:border
                                        [&>li]:border-slate-300
                                        [&>li]:text-slate-400
                                        [&>li]:w-[50px]
                                        [&>li]:rounded-sm
                                        [&>li]:text-center
                                        [&>li]:py-[3px]
                                    ">
                                        <li @click.prevent="change(tbl_.mediums,medium_key,'up')"><i class="fa-solid fa-caret-up"></i></li>
                                        <li @click.prevent="change(tbl_.mediums,medium_key,'down')"><i class="fa-solid fa-caret-down"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <div class="box">
                    <h4 class="mb-[10px]"><i class="fa-solid fa-pencil"></i>ご自由にお好きなシーン<span class="count">8枚</span><span class="example">写真例</span></h4>
                    <div class="space-y-[10px]">
                        <template v-for="(medium,medium_key) in tbl_.mediums">
                            <div v-if="medium.type=='free'" class="
                                [&_.sort-btns_li:first-child]:first:hidden
                                [&_.sort-btns_li:last-child]:last:hidden
                            ">
                                <div class="flex items-center">
                                    <div class="w-[65%]">
                                        <label class="lbl" :for="'medium_'+medium_key">
                                            <div class="choice"><img :src="medium.src" alt="" /></div>
                                            <div class="not-choice py-[50px]" v-if="medium.status==''">画像を選択</div>
                                        </label>
                                        <div v-if="medium.status=='unsaved'" class="text-center mt-[3px] py-[2px] bg-slate-400 text-white text-[12px]">未保存</div>
                                        <div v-if="medium.status=='saved'" class="text-center mt-[3px] py-[2px] bg-green text-white text-[12px]">保存済(変更可)</div>
                                        <input :id="'medium_'+medium_key" type="file" :name="'medium_'+medium_key" accept="image/*" />
                                    </div>
                                    <ul class="sort-btns ml-[10px] space-y-[5px]
                                        [&>li]:border
                                        [&>li]:border-slate-300
                                        [&>li]:text-slate-400
                                        [&>li]:w-[50px]
                                        [&>li]:rounded-sm
                                        [&>li]:text-center
                                        [&>li]:py-[3px]
                                    ">
                                        <li @click.prevent="change(tbl_.mediums,medium_key,'up')"><i class="fa-solid fa-caret-up"></i></li>
                                        <li @click.prevent="change(tbl_.mediums,medium_key,'down')"><i class="fa-solid fa-caret-down"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <div class="box">
                    <h4><i class="fa-solid fa-pencil"></i>フォトアートにしたい写真を<span class="count">3枚</span><span class="example">写真例</span></h4>
                    <p class="text-red font-bold text-[14px] leading-none mb-[10px]">※ この中から1枚選んで「ふぉとあーと」にいたします</p>
                    <div class="space-y-[10px]">
                        <template v-for="(medium,medium_key) in tbl_.mediums">
                            <div v-if="medium.type=='photoart'" class="w-[80%]">
                                <div class="">
                                    <label class="lbl" :for="'medium_'+medium_key">
                                        <div class="choice"><img :src="medium.src" alt="" /></div>
                                        <div class="not-choice py-[70px]" v-if="medium.status==''">画像を選択</div>
                                    </label>
                                    <div v-if="medium.status=='unsaved'" class="text-center mt-[3px] py-[2px] bg-slate-400 text-white text-[12px]">未保存</div>
                                    <div v-if="medium.status=='saved'" class="text-center mt-[3px] py-[2px] bg-green text-white text-[12px]">保存済(変更可)</div>
                                    <input :id="'medium_'+medium_key" type="file" :name="'medium_'+medium_key" accept="image/*" />
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto w-[800px] md:w-auto mt-[50px] md:mt-[25px]">
        <h3 class="bg-main text-white font-bold py-[15px] text-[18px] pl-[20px] flex items-center"><i class="fa-solid fa-pencil mr-[8px] md:mr-[5px]"></i>産声・動画の登録<span class="py-[2px] ml-[5px] inline-block w-[50px] bg-green font-bold text-[14px] text-center text-white">任意</span></h3>

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




        [&_.box_.lbl_.not-choice]:bg-slate-100

        [&_.box_.lbl_.not-choice]:text-[16px]
        [&_.box_.lbl_.not-choice]:block
        [&_.box_.lbl_.not-choice]:text-center
        [&_.box_.lbl_.not-choice]:border
        [&_.box_.lbl_.not-choice]:border-dashed
        [&_.box_.lbl_.not-choice]:border-slate-300

        [&_.box_.lbl_div]:text-slate-400



        ">


            <div class="box">
                <h4 class="mb-[10px]"><i class="fa-solid fa-pencil"></i>エコー写真<span class="count">2枚</span><span class="example">写真例</span></h4>
                <div class="flex justify-between flex-wrap">
                    <template v-for="(medium,medium_key) in tbl_.mediums">
                        <div v-if="medium.type=='first_cry' || medium.type=='movie'" class="w-[48.5%]">
                            <div v-if="medium.type=='first_cry'" class="text-[14px] font-bold text-center mb-[3px]">入れたい産声</div>
                            <div v-if="medium.type=='movie'" class="text-[14px] font-bold text-center mb-[3px]">動画(横アングル)</div>


                            <div class="">
                                <label class="lbl" :for="'medium_'+medium_key">
                                    <div class="choice"><img :src="medium.src" alt="" /></div>
                                    <div class="not-choice py-[40px]" v-if="medium.status==''">画像を選択</div>
                                </label>
                                <div v-if="medium.status=='unsaved'" class="text-center mt-[3px] py-[2px] bg-slate-400 text-white text-[12px]">未保存</div>
                                <div v-if="medium.status=='saved'" class="text-center mt-[3px] py-[2px] bg-green text-white text-[12px]">保存済(変更可)</div>
                                <input :id="'medium_'+medium_key" type="file" :name="'medium_'+medium_key" accept="image/*" />
                            </div>
                        </div>
                    </template>
                </div>
            </div>
            <p class="text-red font-bold text-[14px] leading-none text-center mt-[10px]">※ 動画は20秒前後でお願いします</p>
        </div>




    </section>

    <p class="mt-[50px] md:mt-[30px] w-[340px] md:w-[240px] mx-auto text-center"><button type="submit" value="1" class="relative w-full block bg-green text-white font-bold py-[20px] md:py-[15px] rounded-sm text-[22px] md:text-[16px]" href="/production">確認画面へ<i class="fa-solid fa-angle-right absolute top-[26px] md:top-[18px] right-[15px]"></i></button></p>

    <button class="block w-full fixed bottom-0 left-0 text-16px] py-[15px] font-bold text-white bg-[#999]" type="submit" value="2"><i class="fa-solid fa-download mr-[5px]"></i> 途中保存する</button>
</main>

<script>
    Vue.createApp({
        name: 'main',
        data(){
            return {
                errors:[],

                tbl_:{
                    mediums:[
                        {
                            type:'echo',
                            status:'',
                        },
                        {
                            type:'echo',
                            status:'unsaved',
                            src:'https://local.upload.birth-story.jp:8087/storage/test/echo_1.jpg',
                        },

                        {
                            type:'namecard',
                            status:'saved',
                            src:'https://local.upload.birth-story.jp:8087/storage/test/echo_1.jpg',
                        },
                        {
                            type:'pregnancy',
                            status:'saved',
                            src:'https://local.upload.birth-story.jp:8087/storage/test/pregnancy_1.jpg',
                        },
                        {
                            type:'pregnancy',
                            status:'',
                            src:'',
                        },
                        {
                            type:'pregnancy',
                            status:'saved',
                            src:'https://local.upload.birth-story.jp:8087/storage/test/pregnancy_3.jpg',
                        },
                        {
                            type:'pregnancy',
                            status:'saved',
                            src:'https://local.upload.birth-story.jp:8087/storage/test/pregnancy_4.jpg',
                        },
                        {
                            type:'pregnancy',
                            status:'saved',
                            src:'https://local.upload.birth-story.jp:8087/storage/test/pregnancy_5.jpg',
                        },
                        {
                            type:'pregnancy',
                            status:'saved',
                            src:'https://local.upload.birth-story.jp:8087/storage/test/pregnancy_6.jpg',
                        },
                        {type:'free',status:'saved',src:'https://local.upload.birth-story.jp:8087/storage/test/free_1.jpg',},
                        {type:'free',status:'saved',src:'https://local.upload.birth-story.jp:8087/storage/test/free_2.jpg',},
                        {type:'free',status:'saved',src:'https://local.upload.birth-story.jp:8087/storage/test/free_3.jpg',},
                        {type:'free',status:'saved',src:'https://local.upload.birth-story.jp:8087/storage/test/free_4.jpg',},
                        {type:'free',status:'saved',src:'https://local.upload.birth-story.jp:8087/storage/test/free_5.jpg',},
                        {type:'free',status:'saved',src:'https://local.upload.birth-story.jp:8087/storage/test/free_6.jpg',},
                        {type:'free',status:'saved',src:'https://local.upload.birth-story.jp:8087/storage/test/free_7.jpg',},
                        {type:'free',status:'saved',src:'https://local.upload.birth-story.jp:8087/storage/test/free_8.jpg',},

                        {
                            type:'photoart',
                            status:'unsaved',
                            src:'https://local.upload.birth-story.jp:8087/storage/test/photoarrt_1.jpg',
                        },
                        {
                            type:'photoart',
                            status:'',
                        },
                        {
                            type:'photoart',
                            status:'',
                        },

                        {type:'first_cry',status:'',},
                        {type:'movie',status:'',},
                    ]
                },
            }
        },
        created:async function(){

        },
        methods:{
            change:function(data,i,type){
                if(type=='up'){
                    [data[i-1] ,data[i]] = [data[i],data[i-1]];
                }else{
                    [data[i+1] ,data[i]] = [data[i],data[i+1]];
                }
            },
        },
        watch:{

        },
    }).mount('#main');
</script>
@endsection

@section('javascript')@endsection
