//php artisan breeze:install
//上記コマンドで入った生成ファイル
//使用する
const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        /*
        * 定義済みcssを追加もしくは上書きする
        *
        * 定義済みは下記を参照
        * https://github.com/tailwindlabs/tailwindcss/blob/master/stubs/config.full.js
        *
        *
        *
        *
        * */
        screens:{
            md: {max: '767px'},
        },
        extend: {

            fontFamily: {
                sans: ['-apple-system',
                    'BlinkMacSystemFont',
                    '"游ゴシック体"',
                    'YuGothic',
                    '"Yu Gothic M"',
                    '"游ゴシック Medium"',
                    '"Yu Gothic Medium"',
                    '"ヒラギノ角ゴ ProN W3"',
                    '"Hiragino Kaku Gothic ProN W3"',
                    'HiraKakuProN-W3',
                    '"ヒラギノ角ゴ ProN"',
                    '"Hiragino Kaku Gothic ProN"',
                    '"ヒラギノ角ゴ Pro"',
                    '"Hiragino Kaku Gothic Pro"',
                    '"メイリオ"',
                    'Meiryo',
                    'Osaka',
                    '"ＭＳ Ｐゴシック"',
                    '"MS PGothic"',
                    '"Helvetica Neue"',
                    'HelveticaNeue',
                    'Helvetica',
                    'Arial',
                    '"Segoe UI"',
                    'sans-seri',
                    '"Apple Color Emoji"',
                    '"Segoe UI Emoji"',
                    '"Segoe UI Symbol"',
                    '"Noto Color Emoji"'],
                serif: [
                    '"Yu Mincho"', 'YuMincho','"游明朝"','"游明朝体"','"Hiragino Mincho ProN"','"Hiragino Kaku Gothic ProN"', ...defaultTheme.fontFamily.serif],
                awesome:[
                    '"Font Awesome 5 Free"',
                ],
            },

            /*
            * 色の追加
            * https://tailwindcss.com/docs/customizing-colors
            *  */
            colors: {
                yellow: {DEFAULT:'#FEFBDE'},
                orange: {DEFAULT: '#FF9733'},
                brown: {DEFAULT: '#866827'},
                green: {DEFAULT: '#35CA59'},
                red: {DEFAULT: '#DD3333'},

                main:{
                    //lightest: '#F1F8FF',
                    //light: '#DEEEFE',
                    DEFAULT: '#F68CA9',
                    dark: '#ec7191',
                    //darkest: '#1F4E79',
                },
                sub:{
                    //lightest: '#F1F8FF',
                    light: '#FBFBCB',
                    DEFAULT: '#f5f58f',
                    //dark: '#ec7191',
                    //darkest: '#1F4E79',
                },

                black: {DEFAULT:'#374255'},
                background: {DEFAULT:'#F3F7FA'},
                gray:{
                    350:'#b5bbc4',
                },
                slate:{
                    150:'#eaeff5',
                    250:'#d9e1ea',
                    350:'#b0bccd',
                }
            },

            /*
            * 定義されていないピクセルがあるので独自で作る
            * 0.0625rem //1px
            * 0.125rem //2px
            * 0.1875rem //3px
            * 0.25rem //4px
            * 参考
            * https://tailwindcss.com/docs/customizing-spacing
            * 下記でremが割り出せる
            * 100px / 16 = 6.25rem
            * classの数値は /4
            * 100px / 4 = 25 (mr-25)
            * */
            spacing: {
                '0.25': '0.0625rem',    //1px
                '0.75': '0.1875rem',    //3px
                '1.25': '0.3125rem',    //5px
                '1.75': '0.4375rem',    //7px
                '2.25': '0.5625rem',    //9px
                '3.75': '0.9375rem',    //15px
                '4.5': '1.125rem',      //18px
                '5.5': '1.375rem',      //22px
                '6.25': '1.5625rem',      //25px
                '7': '1.75rem',         //28px
                '7.5': '1.875rem',      //30px
                '11': '2.75rem',        //44px
                '11.5': '2.875rem',     //46px
                '12.5': '3.125rem',     //50px
                '13': '3.25rem',        //52px
                '15': '3.75rem',        //60px
                '17': '4.25rem',        //68px
                '18': '4.5rem',         //72px
                '19': '4.75rem',        //76px
                '21': '5.25rem',        //84px
                '22': '5.5rem',         //88px
                '23': '5.75rem',        //92px
                '25': '6.25rem',        //100px
                '26': '6.5rem',         //104px
                '27': '6.75rem',        //108px
                '29': '7.25rem',        //116px
                '30': '7.5rem',         //120px
                '31': '7.75rem',        //124px
                '32.5': '8.125rem',     //130px
                '33': '8.25rem',        //132px
                '34': '8.5rem',         //136px
                '35': '8.75rem',        //140px
                '37': '9.25rem',        //148px
                '38': '9.5rem',        //152px
                '39': '9.75rem',        //156px
                '41': '10.25rem',        //164px
                '42': '10.5rem',        //168px
                '43': '10.75rem',        //172px
                '50': '12.5rem',        //200px
                '51': '12.75rem',         //204px
                '53': '13.25rem',         //212px
                '54': '13.5rem',         //216px
                '55': '13.75rem',         //220px
                '57': '14.25rem',         //228px
                '58': '14.5rem',         //232px
                '59': '14.75rem',         //236px
                '60': '15rem',         //240px
                '61': '15.25rem',         //244px
                '62': '15.5rem',         //248px
                '63': '15.75rem',         //252px
                '65': '16.25rem',         //260px
                '66': '16.5rem',         //264px
                '67': '16.75rem',         //268px
                '68': '17rem',         //272px
                '69': '17.25rem',         //276px
                '70': '17.5rem',         //280px
                '71': '17.75rem',         //284px
                '73': '18.25rem',         //292px
                '74': '18.5rem',         //296px
                '75': '18.75rem',         //300px
                '76': '19rem',         //304px
                '77': '19.25rem',         //308px
                '78': '19.5rem',         //312px
                '79': '19.75rem',         //316px
                '81': '20.25rem',         //324px
                '82': '20.5rem',         //328px
                '83': '20.75rem',         //332px
                '84': '21rem',         //336px
                '85': '21.25rem',         //340px
                '86': '21.5rem',         //344px
                '87': '21.75rem',         //348px
                '88': '22rem',         //352px
                '89': '22.25rem',         //356px
                '90': '22.5rem',         //360px
                '91': '22.75rem',         //364px
                '92': '23rem',         //368px
                '93': '23.25rem',         //372px
                '94': '23.5rem',         //376px
                '95': '23.75rem',         //380px
                '97': '24.25rem',         //388px
                '98': '24.5rem',         //392px
                '99': '24.75rem',         //396px
                '100': '25rem',         //400px

            },

            lineHeight:{
                '4.5' : '1.125rem',
                '5.5' : '1.375rem',
                '6.5' : '1.625rem',
                '7.5' : '1.875rem',
            },

            fontSize:{
                '2xs':['0.625rem', { lineHeight: '1rem' }],
            },
            minHeight:{
                '7': '1.75rem',         //28px
            },
            zIndex:{
                60: '60',
                70: '70',
                80: '80',
                90: '90',
                100: '100',
                110: '110',
                120: '120',
                130: '130',
                140: '140',
                150: '150',
                160: '160',
                170: '170',
                180: '180',
                190: '190',
                200: '200',
            },
        },

    },

    plugins: [
        require('@tailwindcss/forms'),
    ],
    // important: true,
};
