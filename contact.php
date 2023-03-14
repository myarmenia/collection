<?php
include "header.php";
include "config/con1.php";


?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/my_checklist.css">
    <link rel="stylesheet" href="css/contact.css">

</head>

<body>
<?php 
    include "cookie.php";
?>

<section class="hide_section" ></section>
	<section  style="min-height:500px">

        <div class="start">
            <div class="nachalo">
                <p class="h2 p">Send us a message</p>
            </div>
        </div>

        <div class="container">
            <div class="contact">
                <div class="left">
                    <div class="image">
                        <img src="images/icon/contact_icon.png" alt="">
                    </div>
                    <div class="discription">
                        <p>If you have questions or just want to get in touch, use the form below. We look forward to hearing from you</p>
                    </div>
                </div>
                <div class="right">
                    <div class="form">
                        <p class="h2 text-center mb-5">CONTACT US</p>
                        <input type="text" class="form_input name" placeholder="Your name/ID">
                        <input type="email" class="form_input email" placeholder="Email address">
                        <textarea class="form_input message" placeholder="Type your message here:"></textarea>
                        <button class="send_button">SEND</button>
                        <div class="result"></div>
                    </div>

                </div>
            </div>
        </div>

  </section>
  <footer>
    <?php
        include "footer.php";
    ?>
  </footer>
       
   </body>
<script>
    $('.send_button').on('click',function(){
        let name = $(".name").val()
        let email = $(".email").val()
        let discription = $('.message').val()
        $.ajax({
            type:'POST',
            url:'check_contact_message.php',
            data: { name, email, discription },
            success:function(result){
                $(".result").html(result)
            }
        })
    })
</script>
