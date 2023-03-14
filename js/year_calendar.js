
// function nachalo() {
    // console.log('ON click')
    // $(".nachalo_year").click(function(){
    //     console.log('JQ click')
    // if($(window).width() <= '1275'){
    // $(".jjj").css({"height" :"400px"})
    
    // $(".jjj").css({"display" :"block"})
    //  $(".ggg").css({"height" :"150%"})
    // $(".jjj").hide();
    // $('.nachalo_year').css({'height':'75px'})
    // $(this).css({"height" :"400px"})
   
    // $(this).find(".jjj").show(400);
    
    //document.getElementById('jjj').style.height= "400px";
    //                 document.getElementById("jjj").style.display = "block";
    //                 document.getElementById("jjj").style.hide();
    //  var element1 = document.getElementById("nachalo_year").style.height = "75px";
    //                 document.getElementById("nachalo_year").style.height = "400px";
    //                 document.getElementById("nachalo_year").find(() => ('nachalo_year')).style.show(400);
    // }
//  });
  

// }

$(".before_year").click(function() {
   
   
    let year = $(".year").html()
    $.ajax({
        'method': 'post',
        'url': "calendar/year_calendar/before_year_calendar.php",
        'data': {year},
        success: function(res) {
            let result;

            if(typeof res === 'string') {
             
                result = JSON.parse(res)
                
            } else {
                result = res
            }

            $(".year").html(result.year)
            $(".ggg").html(result.table)
        }
    })
   
})


$(".after_year").click(function() {
    let year = $(".year").html()
    $.ajax({
        'method': 'post',
        'url': "calendar/year_calendar/after_year_calendar.php",
        'data': {year},
        success: function(res) {
            console.log(res)

            let result;

            if(typeof res === 'string') {

                result = JSON.parse(res)

            } else {
                result = res
            }


            $(".year").html(result.year)
            $(".ggg").html(result.table)
        }
    })
})



