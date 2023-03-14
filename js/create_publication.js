$('.addPublication').on('click',function(eee){
    eee.preventDefault()
    
    let title = $('#title').val()
    let discription = $('#discription').val()
    let sporttype = $('#sporttype').val()
    let producer = $('#producer').val()
    let newstype =$('#news_type').val()
    let user_id = $(".user_id").val()


    if( $('#title').val() =='' || $('#discription').val() == ''){
        $("#result").html("<p class='red'>Fill all the fields</p>")
    }else {
        $.post(
            "add_publication.php",
            {title, discription, sporttype, producer, newstype, user_id},
            function (result) {
                $("#result").html(result)
            }
        )
    }

       
})