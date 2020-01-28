$('#btn').on('click', function() {

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },//Headersを書き忘れるとエラーになる
        url: '/ajax',//web.phpのURLに合わせる
        type: 'POST',//リクエストタイプ
        data: { 
                text : 'T',
               },//Laravelに渡すデータ
    })
    // Ajaxリクエスト成功時の処理
    .done(function(data) {
        // Laravel内で処理された結果がdataに入って返ってくる
        console.log(data);
    })
    // Ajaxリクエスト失敗時の処理
    .fail(function(data) {
        alert('Ajaxリクエスト失敗');
    });

});