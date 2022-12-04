$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function load_comment(){
    const product_id = $('.product_id').val();
    const _token = $('input[name="_token"]').val();
    $.ajax({
        type : 'POST',
        dataType : 'JSON',
        data : { product_id:product_id, _token:_token},
        url : 'load-comment',
        success : function (data) {
        $('#comment_show').html(data);
        }
    })
}
