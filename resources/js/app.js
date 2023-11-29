import './bootstrap';

//pagination
$(document).on('click','.pagination a', function(e){
    e.preventDefault();
    let page = $(this).attr('href').split('page=')[1]
    record(page)
})

function record(page){
    $.ajax({
        url:"/?page="+page,
        success:function(res){
            $('.table-data').html(res);
        }
    })
}
