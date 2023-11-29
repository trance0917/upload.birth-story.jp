function mergeDeeply(target, source, opts) {
    const isObject = obj => obj && typeof obj === 'object' && !Array.isArray(obj);
    const isConcatArray = opts && opts.concatArray;
    let result = Object.assign({}, target);
    if (isObject(target) && isObject(source)) {
        for (const [sourceKey, sourceValue] of Object.entries(source)) {
            const targetValue = target[sourceKey];
            if (isConcatArray && Array.isArray(sourceValue) && Array.isArray(targetValue)) {
                result[sourceKey] = targetValue.concat(...sourceValue);
            }
            else if (isObject(sourceValue) && target.hasOwnProperty(sourceKey)) {
                result[sourceKey] = mergeDeeply(targetValue, sourceValue, opts);
            }
            else {
                Object.assign(result, {[sourceKey]: sourceValue});
            }
        }
    }
    return result;
}


function encode_URI_from_hash(data, stockKey="", prefix="&", suffix="") {

    let resultStr = "";
    let t = this;
    if (typeof(data) === "object") {  // 対象データがオブジェクトである場合は再帰呼出し
        Object.keys(data).forEach(function(key) {
            if(data[key]){
                resultStr += encode_URI_from_hash(data[key], stockKey + prefix + encode_URI_from_hash(key) + suffix, "[", "]");
            }else{
                resultStr += encode_URI_from_hash('', stockKey + prefix + encode_URI_from_hash(key) + suffix, "[", "]");
            }
        });
    } else {  // 対象データがオブジェクトでなければ確定
        resultStr = stockKey + "=" + encodeURIComponent(data);
    }
    if (stockKey === "") { resultStr = resultStr.slice(1); }  //１文字目の不要な"&"又は"="を削除
    return resultStr;
}


function error_message_translate(errors){
    for(let error_key in errors){
        if(errors[error_key][0] == 'validation.required'){
            errors[error_key][0] = '入力必須項目です。';
        }else if(errors[error_key][0] == 'validation.numeric' || errors[error_key][0] == 'validation.integer'){
            errors[error_key][0] = '数値を入力してください。';
        }else if(errors[error_key][0] == 'validation.min.numeric'){
            errors[error_key][0] = '正常な数値を入力してください。';
        }else if(errors[error_key][0] == 'validation.not_in'){
            errors[error_key][0] = '正しい値を入力してください。';
        }else if(errors[error_key][0] == 'validation.between'){
            errors[error_key][0] = '正常値を入力してください。';
        }else if(errors[error_key][0] == 'validation.max.string'){
            errors[error_key][0] = '入力値が大きいです。';
        }else if(errors[error_key][0] == 'validation.mimes'){
            errors[error_key][0] = '対応していない拡張子です。';
        }else if(errors[error_key][0] == 'validation.between.numeric'){
            errors[error_key][0] = '範囲が不適切です。';
        }else{
        }
    }
    return errors;
}
function get_error_status_message(status){

    if(status=='400'){
        return 'リクエストに誤りがあります。';
    }else if(status=='401'){
        return 'トークンの有効期限が切れているためリクエストの処理ができませんでした。';
    }else if(status=='409'){
        return '※ 別ユーザーと作業が重なり、一部保存ができませんでした。(赤地部分)<br />\n' +
            '            別ユーザーの内容を優先 → リロード<br />\n' +
            '            この内容を優先 → 強制保存';
    }else if(status=='500'){
        return '予期しないエラーが発生しています。<br />管理者にお問合せください。(500)';
    }else if(status=='413'){
        return 'ファイル容量が大きすぎるため受信できませんでした。';
    }else if(status==''){
        return '';
    }else{
        return '予期しないエラーが発生しています。<br />管理者にお問合せください。';
    }
}

function is_json(data) {
    try {
        JSON.parse(data);
    } catch (error) {
        return false;
    }
    return true;
}

function is_image_extension(extension) {

    if(
        extension.toLowerCase() == 'jpg'
        || extension.toLowerCase() == 'jpeg'
        || extension.toLowerCase() == 'png'
        || extension.toLowerCase() == 'gif'
    ){
        return true;
    }else{
        return false;
    }

}
function generate_token(){
    let chars = 'abcdefghijklmnopqrstuvwxyz';
    let rand_str = '';
    for ( let i = 0; i < 32; i++ ) {
        rand_str += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    return rand_str;
}
