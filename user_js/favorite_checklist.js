$('body').on('click', '.pg-link', function(event){
    event.preventDefault()
    let count_rows=$('#num-rows').attr('data-rows')
    let page_table=$(this).attr('data-value')*1
    let limit=20;
    let table_name = $(".table").attr("data-name")

// --------- for pagination ------------
    $.ajax({
        'method': 'post',
        'url': 'post_pagination.php',
        'data': {page_table, count_rows, limit},
        success:function(result){
            $('.pagination').html(result)
        }
    })
// --- ------- for table -----------------
    $.ajax({
        'method': 'post',
        'url': 'post_table.php',
        'data': {page: page_table, limit, table_name},
        success:function(res){
            $('#num-rows').html(res)

        }
    })
})

$("body").on("click", ".fa-trash", function() {
    let checklist_id = $(this).parent().attr("data-collid")
    let date = ''
    let type = $('.type').val()
    let check_type = $(this).parent().parent().find(".typee").html()

    if(type == 'dates') {
        date = $(this).parent().parent().find('.info').html()
    }

    $(this).parent().parent().remove()
    $.post(
        "Checklist-php/delete.php",
        {checklist_id, type, date, check_type},
        function (result) {
            $(".delete").html(result)
        }
    )
})