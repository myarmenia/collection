<?php
include "../../config/con1.php";
include "../heder.php";

?>
    <body>
    <?php
        include "../menu.php";
    ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-7 add-bs" style="margin: 0 auto">
                    <div class="p-3 card stacked-form">
                        <!-- <button class="btn btn-primary">Add News</button> -->
                        <div class="card-header mb-4 text-center">
                            <h4 class="card-title">Add Dates</h4>
                        </div>
                        <form>
                            <div class="d-flex flex-wrap justify-content-between">
                                <div class="form-group" style="width:48%">
                                  <input type="text" class="form-control py-2" placeholder="From" id="from">
                                </div>
                                <span style="font-size:25px;">-</span>
                                <div class="form-group" style="width:48%">
                                  <input type="text" class="form-control py-2" placeholder="To" id="to">
                                </div>
                              </div>
                        </form>
                        <div class="text-center">
                        <button   class="btn btn-primary p-2" type="submit"  style="width:80px" id="btn">ADD</button>
                      </div>
                        <div class="text-center mt-3 status"></div>
                    </div>
                 </div>
               </div>
            </div>
        </div>
    </div>
    <?php
    include "../footer.php";
    ?>
   <script src="../my_js/add_dates.js"></script>
    </body>
    </html>
