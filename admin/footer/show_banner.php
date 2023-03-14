<?php
    include "../heder.php";

    if(empty($_SESSION['login']) || $_SESSION['login']!="admin"){
        header('location:../index.php');
    }
?>

<link rel="stylesheet" href="../css/show_banner.css">

<body>
    <?php
        include "../menu.php";
        include "../../config/con1.php";

        $content = "";

        $sql = "SELECT * FROM footer_banner";
        $res = mysqli_query($con, $sql);
        $count = 0;

        while($row = mysqli_fetch_assoc($res)) {
            $count++;
            $content .= "<tr>
                            <input type='hidden' class='delete_id' value='" . $row['id'] . "'>
                            <td>" . $count . "</td>
                            <td>" . $row['link'] . "</td>
                            <td><img src='../Footer_banner/" . $row['image'] . "'></td>
                            <td>
                                <i class='fa fa-trash delete_banner'></i>                           
                            </td>";
        }
    ?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables">
                        <div class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                            <div style="margin: 0 auto">
                                <div></div>
                                <table class="users_table table table-striped table-no-bordered table-hover table-responsive" data-name="users">
                                    <thead>
                                        <th>#</th>
                                        <th>LINK</th>
                                        <th>IMAGE</th>
                                        <th>ACTIONS</th>
                                    </thead>
                                    <tbody>
                                        <?=  $content ?>
                                    </tbody>
                                    <tfoot>
                                        <th>#</th>
                                        <th>Link</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="status"></div>

    <?php
        include "../footer.php";
    ?>

    <script src="../my_js/footer_banner.js"></script>

</body>
