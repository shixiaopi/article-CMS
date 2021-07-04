$(function(){

    const loadingAll = layer;
    let loading = null;

    $( document ).ajaxStart(function(){
        loading = loadingAll.load(1, {
            shade: [0.8,'#fff'] //0.1透明度的白色背景
        });
    });
    $( document ).ajaxStop(function() {
        loadingAll.close(loading);
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });


});



const errorMsgFormat = (error) => {
    if(typeof error.responseJSON.errors == "undefined"){
        return error.responseJSON.message;
    }
    let msg = '';
    let object = error.responseJSON.errors;
    for (let item in object){
        msg += object[item][0] + "<br />"
    }
    return msg;
}
