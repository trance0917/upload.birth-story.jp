@extends('layout')
@section('meta')@endsection
@section('contents')
<main id="main" class="w-[800px] mx-auto md:w-full
[&_.error]:font-bold
[&_.error]:text-[12px]
[&_.error]:text-red
[&_.error]:leading-none
[&_.error]:mt-[5px]
" >

    <div v-if="is_loading" class="fixed h-full w-full top-[0] left-[0] bg-amber-50/70 z-50 flex flex-col items-center justify-center pb-[100px]">
        <div class="flower-loader !ml-[-8px] !mt-[-8px]"></div>
        <p class="mt-[35px] text-center font-bold">送信中です。<br />しばらくお待ちください。</p>
    </div>
    @if($tbl_patient->submitted_at)
        <h1 class="mt-[50px] md:mt-[30px] text-center"><span class="px-[20px] md:px-[17px] py-[17px] md:py-[12px] border-2 border-green bg-white text-green font-bold text-[20px] md:text-[16px] inline-block leading-none">このデータは下記の内容で提出済みです</span></h1>
    @endif

    <div class="mt-[40px] md:mt-[20px] flex justify-center">
        <div class="inline-block">
            <div class="flex justify-center items-center bg-sub-light px-[40px] md:px-[20px] py-[30px] md:py-[15px]">
                <img class="w-[52px] md:w-[26px] min-w-[52px] md:min-w-[26px] mr-[20px] md:mr-[10px]" src="/images/icon-finger.png" alt="">
                <p class="text-red font-bold text-[16px] md:text-[12px]">リアルタイムで保存されます。<br />空き時間に少しづつ進めてください。</p>
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
        <li><a class="bg-[#00B900]" href="{{$tbl_patient->mst_maternity->line_url}}">LINEお問い合わせ</a></li>
        <li><a class="bg-slate-400" href="/faq">よくある質問</a></li>
    </ul>

    <div v-if="Object.keys(errors).length" class="mt-[30px] flex justify-center">
        <p class="text-[14px] md:text-[12px] inline-block font-bold bg-red shadow text-white px-[15px] py-[10px] md:px-[10px] md:py-[5px]">※ 不足があります。ご確認のうえ再送信してください</p>
    </div>
    <div v-else class="mt-[30px] flex justify-center opacity-0">
        <p class="text-[14px] md:text-[12px] inline-block font-bold bg-red shadow text-white px-[15px] py-[10px] md:px-[10px] md:py-[5px]">※</p>
    </div>

    <section class="mt-[50px] md:mt-[25px]">
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

        [&_.box_.lbl]:relative
        [&_.box_.lbl]:block
        [&_.box_.lbl_img]:mx-auto

        [&_.box_.lbl_.choice]:bg-slate-100

        [&_.box_.lbl_.choice]:text-[16px]
        [&_.box_.lbl_.choice]:block
        [&_.box_.lbl_.choice]:text-center
        [&_.box_.lbl_.choice]:border
        [&_.box_.lbl_.choice]:border-dashed
        [&_.box_.lbl_.choice]:border-slate-300

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
                    <h4 class="mb-[10px]"><i class="fa-solid fa-pencil"></i>エコー写真<span class="count">@{{ type_counts.echo }}枚</span><span class="example" @click="is_overlay_echo=true">写真例</span></h4>
                    <div class="flex justify-between flex-wrap">
                        <template v-for="(medium,medium_key) in tbl_patient.tbl_patient_mediums">
                        <div v-if="medium.type=='echo'" class="w-[48.5%]">
                            <label class="lbl" :for="'medium_'+medium_key">
                                <div><img :src="medium.src" alt="" /></div>
                                <i v-if="'echo_'+medium_key==loading_input_key"
                                   class="fa-solid fa-spinner fa-spin text-green-200 text-[40px] absolute top-[calc(50%-20px-12px)] left-[calc(50%-20px)]"></i>
                                <div v-if="medium.src" class="text-center mt-[3px] py-[2px] border font-bold border-dashed border-green !text-green text-[12px]">保存済(タップで変更)</div>
                            </label>
                            <input :id="'medium_'+medium_key" type="file" accept="image/*" v-on:change="medium_save(medium_key,$event,medium)" />
                        </div>
                        </template>
                        <div class="w-[48.5%]" v-if="tbl_patient.tbl_patient_mediums.filter((e) => {return e.type=='echo'}).length<type_counts.echo">
                            <label class="lbl">
                                <div class="choice py-[40px]">画像を追加</div>
                                <input type="file" accept="image/*" v-on:change="medium_save('new',$event,{type:'echo'})" />
                                <i v-if="'echo_new'==loading_input_key"
                                    class="fa-solid fa-spinner fa-spin text-green-200 text-[40px] absolute top-[calc(50%-20px)] left-[calc(50%-20px)]"></i>
                            </label>
                        </div>
                    </div>
                    <div class="error text-center" v-if="errors['tbl_patient.tbl_patient_mediums.echo']">@{{ errors['tbl_patient.tbl_patient_mediums.echo'][0] }}</div>
                </div>

                <div class="box">
                    <h4 class="mb-[10px]"><i class="fa-solid fa-pencil"></i>ネームカード<span class="font-normal text-[#999] text-[14px]">(お名前が分かるもの)</span><span class="example" @click="is_overlay_namecard=true">写真例</span></h4>
                    <div class="">
                        <template v-for="(medium,medium_key) in tbl_patient.tbl_patient_mediums">
                        <div v-if="medium.type=='namecard'" class="w-[80%]">
                            <label class="lbl" :for="'medium_'+medium_key">
                                <div><img :src="medium.src" alt="" /></div>
                                <i v-if="'namecard_'+medium_key==loading_input_key"
                                   class="fa-solid fa-spinner fa-spin text-green-200 text-[40px] absolute top-[calc(50%-20px-12px)] left-[calc(50%-20px)]"></i>
                                <div v-if="medium.src" class="text-center mt-[3px] py-[2px] border font-bold border-dashed border-green !text-green text-[12px]">保存済(タップで変更)</div>
                            </label>
                            <input :id="'medium_'+medium_key" type="file" accept="image/*" v-on:change="medium_save(medium_key,$event,medium)" />
                        </div>
                        </template>
                        <div class="w-[80%]" v-if="tbl_patient.tbl_patient_mediums.filter((e) => {return e.type=='namecard'}).length<type_counts.namecard">
                            <label class="lbl">
                                <div class="choice py-[70px]">画像を追加</div>
                                <input type="file" accept="image/*" v-on:change="medium_save('new',$event,{type:'namecard'})" />
                                <i v-if="'namecard_new'==loading_input_key"
                                   class="fa-solid fa-spinner fa-spin text-green-200 text-[40px] absolute top-[calc(50%-20px)] left-[calc(50%-20px)]"></i>
                            </label>
                        </div>
                    </div>
                    <div class="error text-center" v-if="errors['tbl_patient.tbl_patient_mediums.namecard']">@{{ errors['tbl_patient.tbl_patient_mediums.namecard'][0] }}</div>
                </div>

                <div class="box">
                    <h4><i class="fa-solid fa-pencil"></i>出産前・出産中・出産直後<span class="count">@{{ type_counts.pregnancy }}枚</span><span class="example" @click="is_overlay_pregnancy=true">写真例</span></h4>
                    <p class="text-red font-bold text-[14px] leading-none mb-[10px]">※ 表示順に作成されます</p>
                    <div class="space-y-[10px]" :class="{'opacity-60':sorting_key=='pregnancy'}">
                        <template v-for="(medium,medium_key) in tbl_patient.tbl_patient_mediums">
                            <div v-if="medium.type=='pregnancy'" class="
                                [&_.sort-btns_li:first-child]:first:hidden
                                [&_.sort-btns_li:last-child]:last:hidden
                            ">
                                <div class="flex items-center">
                                    <div class="w-[65%]">
                                        <label class="lbl" :for="'medium_'+medium_key">
                                            <div><img :src="medium.src" alt="" /></div>
                                            <i v-if="'pregnancy_'+medium_key==loading_input_key"
                                               class="fa-solid fa-spinner fa-spin text-green-200 text-[40px] absolute top-[calc(50%-20px-12px)] left-[calc(50%-20px)]"></i>
                                            <div v-if="medium.src" class="text-center mt-[3px] py-[2px] border font-bold border-dashed border-green !text-green text-[12px]">保存済(タップで変更)</div>
                                        </label>
                                        <input :id="'medium_'+medium_key" type="file" accept="image/*" v-on:change="medium_save(medium_key,$event,medium)" />
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
                                        <li @click.prevent="sort_change(tbl_patient.tbl_patient_mediums,medium_key,'up','pregnancy')"><i class="fa-solid fa-caret-up"></i></li>
                                        <li @click.prevent="sort_change(tbl_patient.tbl_patient_mediums,medium_key,'down','pregnancy')"><i class="fa-solid fa-caret-down"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </template>
                    </div>
                    <div class="w-[65%] mt-[10px]" v-if="tbl_patient.tbl_patient_mediums.filter((e) => {return e.type=='pregnancy'}).length<type_counts.pregnancy">
                        <label class="lbl">
                            <div class="choice py-[50px]">画像を追加</div>
                            <input type="file" accept="image/*" v-on:change="medium_save('new',$event,{type:'pregnancy'})" />
                            <i v-if="'pregnancy_new'==loading_input_key"
                               class="fa-solid fa-spinner fa-spin text-green-200 text-[40px] absolute top-[calc(50%-20px)] left-[calc(50%-20px)]"></i>
                        </label>
                    </div>
                    <div class="error text-center" v-if="errors['tbl_patient.tbl_patient_mediums.pregnancy']">@{{ errors['tbl_patient.tbl_patient_mediums.pregnancy'][0] }}</div>

                </div>

                <div class="box">
                    <h4 class="mb-[10px]"><i class="fa-solid fa-pencil"></i>ご自由にお好きなシーン<span class="count">@{{ type_counts.free }}枚</span><span class="example" @click="is_overlay_free=true">写真例</span></h4>
                    <div class="space-y-[10px]" :class="{'opacity-60':sorting_key=='free'}">
                        <template v-for="(medium,medium_key) in tbl_patient.tbl_patient_mediums">
                            <div v-if="medium.type=='free'" class="
                                [&_.sort-btns_li:first-child]:first:hidden
                                [&_.sort-btns_li:last-child]:last:hidden
                            ">
                                <div class="flex items-center">
                                    <div class="w-[65%]">
                                        <label class="lbl" :for="'medium_'+medium_key">
                                            <div><img :src="medium.src" alt="" /></div>
                                            <i v-if="'free_'+medium_key==loading_input_key"
                                               class="fa-solid fa-spinner fa-spin text-green-200 text-[40px] absolute top-[calc(50%-20px-12px)] left-[calc(50%-20px)]"></i>
                                            <div v-if="medium.src" class="text-center mt-[3px] py-[2px] border font-bold border-dashed border-green !text-green text-[12px]">保存済(タップで変更)</div>
                                        </label>
                                        <input :id="'medium_'+medium_key" type="file" accept="image/*" v-on:change="medium_save(medium_key,$event,medium)" />
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
                                        <li @click.prevent="sort_change(tbl_patient.tbl_patient_mediums,medium_key,'up','free')"><i class="fa-solid fa-caret-up"></i></li>
                                        <li @click.prevent="sort_change(tbl_patient.tbl_patient_mediums,medium_key,'down','free')"><i class="fa-solid fa-caret-down"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </template>
                    </div>
                    <div class="w-[65%] mt-[10px]" v-if="tbl_patient.tbl_patient_mediums.filter((e) => {return e.type=='free'}).length<type_counts.free">
                        <label class="lbl">
                            <div class="choice py-[50px]">画像を追加</div>
                            <input type="file" accept="image/*" v-on:change="medium_save('new',$event,{type:'free'})" />
                            <i v-if="'free_new'==loading_input_key"
                               class="fa-solid fa-spinner fa-spin text-green-200 text-[40px] absolute top-[calc(50%-20px)] left-[calc(50%-20px)]"></i>
                        </label>
                    </div>
                    <div class="error text-center" v-if="errors['tbl_patient.tbl_patient_mediums.free']">@{{ errors['tbl_patient.tbl_patient_mediums.free'][0] }}</div>

                </div>

                <div class="box">
                    <h4><i class="fa-solid fa-pencil"></i>フォトアートにしたい写真を<span class="count">@{{ type_counts.photoart }}枚</span><span class="example" @click="is_overlay_photoart=true">写真例</span></h4>
                    <p class="text-red font-bold text-[14px] leading-none mb-[10px]">※ この中から1枚選んで「ふぉとあーと」にいたします</p>
                    <div class="space-y-[10px]">
                        <template v-for="(medium,medium_key) in tbl_patient.tbl_patient_mediums">
                            <div v-if="medium.type=='photoart'" class="w-[80%]">
                                <label class="lbl" :for="'medium_'+medium_key">
                                    <div><img :src="medium.src" alt="" /></div>
                                    <i v-if="'photoart_'+medium_key==loading_input_key"
                                       class="fa-solid fa-spinner fa-spin text-green-200 text-[40px] absolute top-[calc(50%-20px-12px)] left-[calc(50%-20px)]"></i>
                                    <div v-if="medium.src" class="text-center mt-[3px] py-[2px] border font-bold border-dashed border-green !text-green text-[12px]">保存済(タップで変更)</div>
                                </label>
                                <input :id="'medium_'+medium_key" type="file" accept="image/*" v-on:change="medium_save(medium_key,$event,medium)" />
                            </div>
                        </template>
                        <div class="w-[80%]" v-if="tbl_patient.tbl_patient_mediums.filter((e) => {return e.type=='photoart'}).length<type_counts.photoart">
                            <label class="lbl">
                                <div class="choice py-[70px]">画像を追加</div>
                                <input type="file" accept="image/*" v-on:change="medium_save('new',$event,{type:'photoart'})" />
                                <i v-if="'photoart_new'==loading_input_key"
                                   class="fa-solid fa-spinner fa-spin text-green-200 text-[40px] absolute top-[calc(50%-20px)] left-[calc(50%-20px)]"></i>
                            </label>
                        </div>
                    </div>
                    <div class="error text-center" v-if="errors['tbl_patient.tbl_patient_mediums.photoart']">@{{ errors['tbl_patient.tbl_patient_mediums.photoart'][0] }}</div>

                </div>
            </div>
        </div>
    </section>

    <section class="mt-[50px] md:mt-[25px]">
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

        [&_.box_.lbl]:relative
        [&_.box_.lbl_img]:mx-auto
        [&_.box_.lbl_.choice]:bg-slate-100

        [&_.box_.lbl_.choice]:text-[16px]
        [&_.box_.lbl_.choice]:block
        [&_.box_.lbl_.choice]:text-center
        [&_.box_.lbl_.choice]:border
        [&_.box_.lbl_.choice]:border-dashed
        [&_.box_.lbl_.choice]:border-slate-300
        [&_.box_.lbl_div]:text-slate-400
        ">

            <div class="box">
                <div class="flex justify-between flex-wrap">
                    <template v-for="(medium,medium_key) in tbl_patient.tbl_patient_mediums">
                        <div v-if="medium.type=='first_cry'" class="w-[48.5%]">
                            <div class="text-[14px] font-bold text-center mb-[3px]">入れたい産声</div>
                            <div class="">
                                <label class="lbl" :for="'medium_'+medium_key">
                                    <i v-if="'first_cry_'+medium_key==loading_input_key"
                                       class="fa-solid fa-spinner fa-spin text-green-200 text-[40px] absolute top-[calc(50%-20px)] left-[calc(50%-20px)]"></i>
                                    <div v-if="medium.src" class="text-center mt-[3px] py-[2px] border font-bold border-dashed border-green !text-green text-[12px] py-[40px] bg-green-50">保存済(タップで変更)</div>
                                </label>
                                <p class="mt-[8px] text-center text-center"><a :href="medium.src" class="border rounded-sm border-main px-[7px] py-[3px] inline-block underline text-main font-bold text-[14px]" target="_blank">内容を確認</a></p>
                                <input :id="'medium_'+medium_key" type="file" accept="video/*" v-on:change="medium_save(medium_key,$event,medium)" />
                            </div>
                        </div>
                    </template>
                    <div class="w-[48.5%]" v-if="tbl_patient.tbl_patient_mediums.filter((e) => {return e.type=='first_cry'}).length<type_counts.movie">
                        <div class="text-[14px] font-bold text-center mb-[3px]">入れたい産声</div>
                        <label class="lbl">
                            <div class="choice py-[40px]">動画を追加</div>
                            <input type="file" accept="video/*" v-on:change="medium_save('new',$event,{type:'first_cry'})" />
                            <i v-if="'first_cry_new'==loading_input_key"
                               class="fa-solid fa-spinner fa-spin text-green-200 text-[40px] absolute top-[calc(50%-20px)] left-[calc(50%-20px)]"></i>
                        </label>
                        <div class="error text-center" v-if="errors['tbl_patient.tbl_patient_mediums.first_cry']">@{{ errors['tbl_patient.tbl_patient_mediums.first_cry'][0] }}</div>
                    </div>



                    <template v-for="(medium,medium_key) in tbl_patient.tbl_patient_mediums">
                        <div v-if="medium.type=='movie'" class="w-[48.5%]">
                            <div class="text-[14px] font-bold text-center mb-[3px]">動画(横アングル)</div>
                            <div class="">
                                <label class="lbl" :for="'medium_'+medium_key">
                                    <i v-if="'movie_'+medium_key==loading_input_key"
                                       class="fa-solid fa-spinner fa-spin text-green-200 text-[40px] absolute top-[calc(50%-20px)] left-[calc(50%-20px)]"></i>
                                    <div v-if="medium.src" class="text-center mt-[3px] py-[2px] border font-bold border-dashed border-green !text-green text-[12px] py-[40px] bg-green-50">保存済(タップで変更)</div>
                                </label>
                                <p class="mt-[8px] text-center text-center"><a :href="medium.src" class="border rounded-sm border-main px-[7px] py-[3px] inline-block underline text-main font-bold text-[14px]" target="_blank">内容を確認</a></p>
                                <input :id="'medium_'+medium_key" type="file" accept="video/*" v-on:change="medium_save(medium_key,$event,medium)" />
                            </div>
                        </div>
                    </template>

                    <div class="w-[48.5%]" v-if="tbl_patient.tbl_patient_mediums.filter((e) => {return e.type=='movie'}).length<type_counts.movie">
                        <div class="text-[14px] font-bold text-center mb-[3px]">動画(横アングル)</div>
                        <label class="lbl">
                            <div class="choice py-[40px]">動画を追加</div>
                            <input type="file" accept="video/*" v-on:change="medium_save('new',$event,{type:'movie'})" />
                            <i v-if="'movie_new'==loading_input_key"
                               class="fa-solid fa-spinner fa-spin text-green-200 text-[40px] absolute top-[calc(50%-20px)] left-[calc(50%-20px)]"></i>
                        </label>
                        <div class="error text-center" v-if="errors['tbl_patient.tbl_patient_mediums.movie']">@{{ errors['tbl_patient.tbl_patient_mediums.movie'][0] }}</div>
                    </div>

                </div>


            </div>
            <p class="text-red font-bold text-[14px] leading-none text-center mt-[10px]">※ 動画は20秒前後でお願いします</p>
        </div>

    </section>

    <section class="mt-[50px] md:mt-[25px]">
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
        [&_.box>.item>dd_.complement]:text-slate-500
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
                        <dd class="!h-[1.4em] !leading-[1.4em] font-bold">@{{tbl_patient.mst_maternity.name}}</dd>
                    </div>
                    <div class="item">
                        <dt>ママのお名前</dt>
                        <dd><input class="txt w-[150px]" type="text" placeholder="例：山田 花子" v-model="tbl_patient.name" @change="input_save('name',tbl_patient.name)" /><span v-if="'name'==loading_input_key" class="ml-[5px] text-green font-bold">保存中</span>
                            <div class="error" v-if="errors['tbl_patient.name']">@{{ errors['tbl_patient.name'][0] }}</div>
                        </dd>
                    </div>
                    <div class="item">
                        <dt>ローマ字表記</dt>
                        <dd><input class="txt w-[190px]" type="text" placeholder="例：YAMADA HANAKO" v-model="tbl_patient.roman_alphabet" @change="input_save('roman_alphabet',tbl_patient.roman_alphabet)" /><span v-if="'roman_alphabet'==loading_input_key" class="ml-[5px] text-green font-bold">保存中</span><br />
                            <span class="complement">※ 大文字または小文字</span>
                            <div class="error" v-if="errors['tbl_patient.roman_alphabet']">@{{ errors['tbl_patient.roman_alphabet'][0] }}</div>
                        </dd>
                    </div>
                    {{--                    <div class="item">--}}
                    {{--                        <dt>電話番号</dt>--}}
                    {{--                        <dd><input class="txt w-[130px]" type="tel" value="" placeholder="例：08012345678" /><br />--}}
                    {{--                        <span class="complement">※ ハイフン不要</span>--}}
                    {{--                        </dd>--}}
                    {{--                    </div><div class="item">--}}
                    {{--                        <dt>メールアドレス</dt>--}}
                    {{--                        <dd><input class="txt w-[210px]" type="email" value="" placeholder="例：info@birth-story.jp" /></dd>--}}
                    {{--                    </div>--}}
                </dl>
            </div>

            <div class="outer">
                <h4><i class="fa-solid fa-pencil"></i>ベビーの情報</h4>
                <dl class="box">
                    <div class="item">
                        <dt>お名前</dt>
                        <dd><input class="txt w-[110px]" type="text" placeholder="例：花子" v-model="tbl_patient.baby_name" @change="input_save('baby_name',tbl_patient.baby_name)" /><span v-if="'baby_name'==loading_input_key" class="ml-[5px] text-green font-bold">保存中</span><br />
                            <span class="complement">※ 未記入可</span>
                            <div class="error" v-if="errors['tbl_patient.baby_name']">@{{ errors['tbl_patient.baby_name'][0] }}</div>
                        </dd>
                    </div>
                    <div class="item">
                        <dt>ローマ字表記</dt>
                        <dd><input class="txt w-[140px]" type="text" placeholder="例：HANAKO" v-model="tbl_patient.baby_roman_alphabet" @change="input_save('baby_roman_alphabet',tbl_patient.baby_roman_alphabet)" /><span v-if="'baby_roman_alphabet'==loading_input_key" class="ml-[5px] text-green font-bold">保存中</span><br />
                            <span class="complement">※ 未記入可</span>
                            <div class="error" v-if="errors['tbl_patient.baby_roman_alphabet']">@{{ errors['tbl_patient.baby_roman_alphabet'][0] }}</div>
                        </dd>
                    </div>
                    <div class="item">
                        <dt>生まれた日</dt>
                        <dd><input class="txt w-[120px]" type="date" placeholder="年 / 月 / 日" v-model="tbl_patient.birth_day" @change="input_save('birth_day',tbl_patient.birth_day)" /><span v-if="'birth_day'==loading_input_key" class="ml-[5px] text-green font-bold">保存中</span><br />
                            <div class="error" v-if="errors['tbl_patient.birth_day']">@{{ errors['tbl_patient.birth_day'][0] }}</div>
                        </dd>
                    </div>
                    <div class="item">
                        <dt>生まれた時刻</dt>
                        <dd><input class="txt w-[100px]" type="time" placeholder="--:--" v-model="tbl_patient.birth_time" @change="input_save('birth_time',tbl_patient.birth_time)" /><span v-if="'birth_time'==loading_input_key" class="ml-[5px] text-green font-bold">保存中</span><br />
                            <div class="error" v-if="errors['tbl_patient.birth_time']">@{{ errors['tbl_patient.birth_time'][0] }}</div>
                        </dd>
                    </div>
                    <div class="item">
                        <dt>体重</dt>
                        <dd><input class="txt w-[80px]" type="number" v-model="tbl_patient.weight" @change="input_save('weight',tbl_patient.weight)" /><span class="unit">g</span><span v-if="'weight'==loading_input_key" class="ml-[5px] text-green font-bold">保存中</span><br />
                            <div class="error" v-if="errors['tbl_patient.weight']">@{{ errors['tbl_patient.weight'][0] }}</div>
                        </dd>
                    </div>
                    <div class="item">
                        <dt>身長</dt>
                        <dd><input class="txt w-[70px]" type="number" v-model="tbl_patient.height" @change="input_save('height',tbl_patient.height)" /><span class="unit">cm</span><span v-if="'height'==loading_input_key" class="ml-[5px] text-green font-bold">保存中</span><br />
                            <div class="error" v-if="errors['tbl_patient.height']">@{{ errors['tbl_patient.height'][0] }}</div>
                        </dd>
                    </div>
                    <div class="item">
                        <dt>性別</dt>
                        <dd><select class="txt text-center w-[70px] mr-[10px]" v-model="tbl_patient.sex" @change="input_save('sex',tbl_patient.sex)">
                                <option value="">--</option>
                                <option v-for="(sex_type,sex_type_key) in sex_types" :value="sex_type_key">@{{ sex_type }}</option>
                            </select>
                            <span class="unit ml-[10px]">第</span>
                            <select class="txt text-center w-[50px] ml-[5px]" v-model="tbl_patient.what_number" @change="input_save('what_number',tbl_patient.what_number)">
                                <option value="">--</option>
                                <option v-for="n in 9" :key="n" :value="n">@{{ n }}</option>
                            </select><span class="unit">子</span><span v-if="'sex'==loading_input_key" class="ml-[5px] text-green font-bold">保存中</span><span v-if="'what_number'==loading_input_key" class="ml-[5px] text-green font-bold">保存中</span>
                            <div class="error" v-if="errors['tbl_patient.sex']">@{{ errors['tbl_patient.sex'][0] }}</div>
                            <div class="error" v-if="errors['tbl_patient.what_number']">@{{ errors['tbl_patient.what_number'][0] }}</div>
                        </dd>
                    </div>
                </dl>
            </div>

            <div class="outer">
                <h4><i class="fa-solid fa-pencil"></i>確認事項</h4>
                <dl class="box">
                    <div class="item">
                        <dt>1ヶ月健診日</dt>
                        <dd><input class="w-[140px]" type="date" placeholder="例：YAMADA HANAKO" v-model="tbl_patient.health_check_date" @change="input_save('health_check_date',tbl_patient.health_check_date)" /><span v-if="'health_check_date'==loading_input_key" class="ml-[5px] text-green font-bold">保存中</span><br />
                            <div class="error" v-if="errors['tbl_patient.health_check_date']">@{{ errors['tbl_patient.health_check_date'][0] }}</div>
                        </dd>
                    </div>
                    <div class="item">
                        <dt>備考 <span class="text-slate-600 text-[12px]">(任意)</span></dt>
                        <dd><textarea class="w-full" rows="4" placeholder="伝えておきたいことなど" v-model="tbl_patient.message" @change="input_save('message',tbl_patient.message)"></textarea><span v-if="'message'==loading_input_key" class="text-green font-bold">保存中</span>
                            <div class="error" v-if="errors['tbl_patient.message']">@{{ errors['tbl_patient.message'][0] }}</div>
                        </dd>
                    </div>
                    <div class="item pt-[10px]">
                        <dd>
                            <div class="text-center text-[12px] font-bold">ベビー写真を色補正してインスタグラムに<br />
                                掲載することがあります。</div>
                            <ul class="flex space-x-[15px] mt-[5px] justify-center">
                                <li><input class="mr-[3px]" name="is_use_instagram" type="radio" id="is_use_instagram_1" value="1" v-model="tbl_patient.is_use_instagram" @change="input_save('is_use_instagram',tbl_patient.is_use_instagram)"><label for="is_use_instagram_1" class="flex items-center">許可する</label></li>
                                <li><input class="mr-[3px]" name="is_use_instagram" type="radio" id="is_use_instagram_2" value="2" v-model="tbl_patient.is_use_instagram" @change="input_save('is_use_instagram',tbl_patient.is_use_instagram)"><label for="is_use_instagram_2" class="flex items-center">許可しない</label></li>
                            </ul>
                            <div class="error text-center" v-if="errors['tbl_patient.is_use_instagram']">@{{ errors['tbl_patient.is_use_instagram'][0] }}</div>
                            <div class="text-center mt-[20px]"><a class="text-main underline" href="https://www.instagram.com/birthstory.jp/" target="_blank">BIRTH STORY公式インスタはこちら</a></div>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    @if(!$tbl_patient->submitted_at)

    <p v-if="Object.keys(errors).length" class="mt-[50px] md:mt-[30px] w-[340px] md:w-[240px] mx-auto text-center"><span class="relative w-full block bg-slate-300 text-white font-bold py-[20px] md:py-[15px] rounded-sm text-[22px] md:text-[16px]" @click.prevent="">提出の確認へ<i class="fa-solid fa-angle-right absolute top-[26px] md:top-[18px] right-[15px]"></i></span></p>
    <p v-else class="mt-[50px] md:mt-[30px] w-[340px] md:w-[240px] mx-auto text-center"><span class="relative w-full block bg-green text-white font-bold py-[20px] md:py-[15px] rounded-sm text-[22px] md:text-[16px]" @click.prevent="submit">提出の確認へ<i class="fa-solid fa-angle-right absolute top-[26px] md:top-[18px] right-[15px]"></i></span></p>

    @else
        <p class="mt-[20px] md:mt-[15px] w-[140px] md:w-[120px] mx-auto text-center">
            <a class="w-full block bg-slate-400 text-white font-bold py-[8px] md:py-[8px] rounded-sm text-[16px] md:text-[14px]" href="{{route('guide',$tbl_patient)}}">戻る</a></p>
    @endif

    <form action="{{route('story-confirm',$tbl_patient)}}" method="post" ref="form">
        @csrf
    </form>

{{--    <button class="block w-full fixed bottom-0 left-0 text-16px] py-[15px] font-bold text-white bg-slate-400" type="submit" value="2"><i class="fa-solid fa-download mr-[5px]"></i> 途中保存する</button>--}}

    <div v-if="is_overlay_echo" class="flex items-center justify-center w-full h-full fixed top-0 left-0 bg-[#000000]/20" @click="is_overlay_echo=false">
        <div class="w-[80%] p-[15px] border border-slate-300 bg-white">
            <p class="mb-[15px] text-red text-[18px] font-bold text-center">エコーの写真例</p>
            <div class="flex justify-center">
                <div class="mr-[10px]"><img src="/images/sample-echo-1.png" alt="" /></div>
                <div class=""><img src="/images/sample-echo-2.png" alt="" /></div>
            </div>
            <p class="mt-[10px] text-center text-[14px] text-slate-500">タップで閉じる</p>
        </div>
    </div>

    <div v-if="is_overlay_namecard" class="flex items-center justify-center w-full h-full fixed top-0 left-0 bg-[#000000]/20" @click="is_overlay_namecard=false">
        <div class="w-[80%] p-[15px] border border-slate-300 bg-white">
            <p class="mb-[15px] text-red text-[18px] font-bold text-center">ネームカードなど</p>
            <div class="flex justify-center">
                <div class="mr-[10px]"><img src="/images/sample-name-card-1.png" alt="" /></div>
                <div class=""><img src="/images/sample-name-card-2.png" alt="" /></div>
            </div>
            <p class="mt-[10px] text-center text-[14px] text-slate-500">タップで閉じる</p>
        </div>
    </div>

    <div v-if="is_overlay_pregnancy" class="flex items-center justify-center w-full h-full fixed top-0 left-0 bg-[#000000]/20" @click="is_overlay_pregnancy=false">
        <div class="w-[80%] p-[15px] border border-slate-300 bg-white">
            <p class="mb-[15px] text-red text-[18px] font-bold text-center">出産前後の写真例</p>
            <div class="flex justify-center mb-[10px]">
                <div class="mr-[10px] w-[46%]"><img class="mx-auto" src="/images/sample-pregnancy-1.png" alt="" /></div>
                <div class=" w-[46%]"><img class="mx-auto" src="/images/sample-pregnancy-2.png" alt="" /></div>
            </div>

            <div class="text-center mb-[10px] w-[46%] mx-auto"><img src="/images/sample-pregnancy-3.png" alt="" /></div>

            <div class="flex justify-center">
                <div class="mr-[10px] w-[46%]"><img class="mx-auto" src="/images/sample-pregnancy-4.png" alt="" /></div>
                <div class="w-[46%]"><img class="mx-auto" src="/images/sample-pregnancy-5.png" alt="" /></div>
            </div>
            <p class="mt-[10px] text-center text-[14px] text-slate-500">タップで閉じる</p>
        </div>
    </div>
    <div v-if="is_overlay_free" class="flex items-center justify-center w-full h-full fixed top-0 left-0 bg-[#000000]/20" @click="is_overlay_free=false">
        <div class="w-[80%] p-[15px] border border-slate-300 bg-white">
            <p class="mb-[15px] text-red text-[18px] font-bold text-center">自由写真の例</p>
            <div class="flex justify-center mb-[10px]">
                <div class="mr-[10px] w-[46%]"><img class="mx-auto" src="/images/sample-free-1.png" alt="" /></div>
                <div class="w-[46%]"><img class="mx-auto" src="/images/sample-free-2.png" alt="" /></div>
            </div>

            <div class="text-center mb-[10px] w-[46%] mx-auto"><img src="/images/sample-free-3.png" alt="" /></div>

            <div class="flex justify-center">
                <div class="mr-[10px] w-[46%]"><img class="mx-auto" src="/images/sample-free-4.png" alt="" /></div>
                <div class="w-[46%]"><img class="mx-auto" src="/images/sample-free-5.png" alt="" /></div>
            </div>
            <p class="mt-[10px] text-center text-[14px] text-slate-500">タップで閉じる</p>
        </div>
    </div>

    <div v-if="is_overlay_photoart" class="flex items-center justify-center w-full h-full fixed top-0 left-0 bg-[#000000]/20" @click="is_overlay_photoart=false">
        <div class="w-[80%] p-[15px] border border-slate-300 bg-white">
            <p class="mb-[15px] text-red text-[18px] font-bold text-center">フォトアートにしたい写真の例</p>
            <div class="flex justify-center mb-[10px]">
                <div class="mr-[10px] w-[46%]"><img class="mx-auto" src="/images/sample-photoart-1.png" alt="" /></div>
                <div class="w-[46%]"><img class="mx-auto" src="/images/sample-photoart-2.png" alt="" /></div>
            </div>

            <div class="flex justify-center mb-[10px]">
                <div class="mr-[10px] w-[46%]"><img class="mx-auto" src="/images/sample-photoart-3.png" alt="" /></div>
                <div class="w-[46%]"><img class="mx-auto" src="/images/sample-photoart-4.png" alt="" /></div>
            </div>

            <div class="flex justify-center">
                <div class="mr-[10px] w-[46%]"><img class="mx-auto" src="/images/sample-photoart-5.png" alt="" /></div>
                <div class="w-[46%]"><img class="mx-auto" src="/images/sample-photoart-6.png" alt="" /></div>
            </div>

            <p class="mt-[10px] text-center text-[14px] text-slate-500">タップで閉じる</p>
        </div>
    </div>

</main>

<script>
    Vue.createApp({
        name: 'main',
        data(){
            return {
                is_loading:false,
                loading_input_key:'',
                sorting_key:'',
                errors:[],
                is_overlay_echo:false,
                is_overlay_namecard:false,
                is_overlay_pregnancy:false,
                is_overlay_free:false,
                is_overlay_photoart:false,
                sex_types:{!! json_encode(App\Models\TblPatient::$sex_types,JSON_UNESCAPED_UNICODE )!!},
                type_counts:{!! json_encode(App\Models\TblPatientMedium::$type_counts,JSON_UNESCAPED_UNICODE )!!},

                tbl_patient:{
                    tbl_patient_mediums:[]
                },
            }
        },
        beforeMount:async function(){
            this.tbl_patient = mergeDeeply(this.tbl_patient,{!! json_encode($tbl_patient,JSON_UNESCAPED_UNICODE )!!},{concatArray: true});
        },
        created:async function(){

        },
        methods:{
            async submit(){
                let t = this;
                this.errors={};
                this.is_loading=true;
                await axios.post('/api/v1/g/{{$tbl_patient->code}}/story/',
                    {
                        tbl_patient:t.tbl_patient,
                    }
                ).then((response) => {//リクエストの成功
                    t.$refs.form.submit();
                }).catch((error) => {//リクエストの失敗
                    window.scroll({
                        top: 0,
                        behavior: "smooth",
                    });
                    t.errors = error.response.data.errors;
                    t.errors = error_message_translate(t.errors);

                }).finally(() => {
                    this.is_loading=false;
                });
            },
            async sort_change(data,i,direction,medium_type){
                if(direction=='up'){
                    [data[i-1] ,data[i]] = [data[i],data[i-1]];
                }else{
                    [data[i+1] ,data[i]] = [data[i],data[i+1]];
                }

                this.sorting_key=medium_type;

                let tbl_patient_medium_ids = this.tbl_patient.tbl_patient_mediums.filter((e) => {return e.type==medium_type}).map((e) => {return e.tbl_patient_medium_id});

                await axios.post('/api/v1/g/{{$tbl_patient->code}}/story/medium/sort',
                    {tbl_patient_medium_ids:tbl_patient_medium_ids}
                ).then((response) => {//リクエストの成功
                    // delete t.errors['tbl_patient.'+key];
                }).catch((error) => {//リクエストの失敗
                    // let errors = error_message_translate(error.response.data.errors);
                    // t.errors['tbl_patient.'+key] = errors['tbl_patient.'+key];
                }).finally(() => {
                    this.sorting_key='';
                });



            },

            async input_save(key,val){
                if(this.tbl_patient.submitted_at){
                    return;
                }

                let t = this;
                let data = {[key]:val};
                this.loading_input_key=key;
                await axios.post('/api/v1/g/{{$tbl_patient->code}}/story/input',
                    {
                        tbl_patient:data,
                        key:'tbl_patient.'+key,
                    }
                ).then((response) => {//リクエストの成功
                    delete t.errors['tbl_patient.'+key];
                }).catch((error) => {//リクエストの失敗
                    let errors = error_message_translate(error.response.data.errors);
                    t.errors['tbl_patient.'+key] = errors['tbl_patient.'+key];
                }).finally(() => {
                    this.loading_input_key='';
                });
            },
            async medium_save(key,e,medium){
                if(this.tbl_patient.submitted_at){
                    return;
                }
                let t = this;
                this.loading_input_key=medium.type+'_'+key;

                await axios.post('/api/v1/g/{{$tbl_patient->code}}/story/medium',
                    {
                        tbl_patient:{
                            tbl_patient_mediums:{
                                [key]:{
                                    ...medium,
                                    file:e.target.files[0],
                                }
                            }
                        },
                        key:key,
                    }
                    ,{headers: {'content-type': 'multipart/form-data'}}
                ).then((response) => {//リクエストの成功

                    if(!medium.tbl_patient_medium_id){
                        t.tbl_patient.tbl_patient_mediums.push(response.data.result);
                    }
                    for(let tbl_patient_medium_key in t.tbl_patient.tbl_patient_mediums){
                        if(medium.tbl_patient_medium_id == t.tbl_patient.tbl_patient_mediums[tbl_patient_medium_key].tbl_patient_medium_id){
                            t.tbl_patient.tbl_patient_mediums[tbl_patient_medium_key] = response.data.result;
                        }
                    }
                }).catch((error) => {//リクエストの失敗
                    alert(get_error_status_message(error.response.status));
                }).finally(() => {
                    e.target.value='';
                    this.loading_input_key='';
                    delete t.errors['tbl_patient.tbl_patient_mediums.'+medium.type];

                    this.refleshSort();
                });

                // const reader = new FileReader();
                // reader.onload =  function(ee) {
                //     let data = {};
                //     data={
                //         is_image:true,
                //         src:ee.target.result,
                //         file:e.target.files[0]
                //     };
                //     t.files[type].push(data);
                // };
                // if(e.target.files[0] instanceof Object){
                //     reader.readAsDataURL(e.target.files[0]);
                // }
            },

            refleshSort:function(){
                this.tbl_patient.tbl_patient_mediums.sort(function(a,b) {
                    return a.type < b.type ? -1 : 1;
                });
            },
        },
        watch:{

        },
    }).mount('#main');
</script>
@endsection

@section('javascript')@endsection
