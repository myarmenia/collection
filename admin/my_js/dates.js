$(document).ready(function() {

    // Edit
    $("table").on('click', '.a_edit', function(event) {
        event.preventDefault();
        if($(this).hasClass('edit')){
            $(this).parent().parent().find('td').not($(this).parent()).not(':first').attr("contenteditable","true")
            $(this).parent().parent().find('td').not($(this).parent()).not(':first').css("border","1px solid #133690")

        }
        else if($(this).hasClass('save')){
            $(this).parent().parent().find('td').attr("contenteditable","false")
            $(this).parent().parent().find('td').css("border","none")
            var t=$(this).parent().parent()
            var d_id=$(this).attr('name')
            var dates=t.find('.data').html()
            //console.log(dates)
            $.ajax({
                type: "post",
                url: "save_changed_dates.php",
                data: {id: d_id, dates: dates },
                success: function(){
                    location.reload()
                }
            })
        }

        $(this).toggleClass('edit').toggleClass("save");
        $(this).find('i').toggleClass('fa-save').toggleClass('fa-edit')

    });

    // Delete
    $("table").on('click', '.remove', function(e) {
        //alert()
        e.preventDefault();
        var d_id = $(this).attr('data_name');
        $(this).parent().parent().remove()

        $.ajax({
            type: "post",
            url: "save_changed_dates.php",
            data: {remove_id: d_id },
            success: function(){
            }
        })

    });

});