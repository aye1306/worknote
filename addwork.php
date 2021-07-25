<!DOCTYPE doctype html>
<html>
    <?php include('include/header.php'); ?>
    <body>
        <?php include('include/sidebar.php'); ?>
        <div class="page-main w-100">
            <!-- page-main-->
            <?php include('include/navbar.php'); ?>
            <div class="container"> <!--container-fluid-->
                <div class="debug" style="margin-top:60px;">
                    <p class="h3 text-center text-secondary"><strong>เพิ่มงานใหม่</strong></p>
                </div>
                <hr>
                <div class="row no-gutters px-1 mt-3" id="work">
                    <!--row-->
                    <div class="col-md">
                    <div class="card px-1">
                            <div class="card-body">
                                <p class="card-title mb-3 h4"><strong>ระบุรายละเอียดงาน</strong></p>
                                <div class="row align-items-center d-flex justify-content-start" id="work_type"> 
                                    <div class="col-6">
                                        <label class="radio mr-1"> 
                                            <input type="radio" name="add" value="0" checked> 
                                            <span style="font-size:20px;">
                                                <strong>&nbsp;<i class="fas fa-file-alt text-primary"></i>&nbsp; งานเดี่ยว</strong>
                                            </span> 
                                        </label>
                                    </div>
                                    
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                        <label class="form-label h6" for="username"><strong>วิชา : </strong></label>
                                        <input class="form-control" type="text" placeholder="Name"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                        <label class="form-label h6" for="username"><strong>ชื่องาน : </strong></label>
                                        <input class="form-control" type="text" placeholder="Name"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                        <label class="form-label h6" for="username"><strong>วันที่: </strong></label>
                                        <input class="form-control" type="text" placeholder="Name"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                        <label class="form-label h6" for="username"><strong>เวลา : </strong></label>
                                        <input class="form-control" type="text" placeholder="Name"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                        <label class="form-label h6" for="username"><strong>รายละเอียดงาน : </strong></label>
                                        <input class="form-control" type="text" placeholder="Name"> 
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-success btn-block confirm-button mt-4">เพิ่มงาน &nbsp;<i class="fas fa-plus"></i></button>
                            </div>
                        </div>

                </div>
                    </div>
                <!--row-->
                <div class="row h-25"></div>
            </div>
            <!--container-fluid-->
            <?php include('include/nav_footer.php'); ?>
        </div>
        <!-- page-main-->
        <?php include('js/js.php'); ?>
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
        const length = localStorage.length;
        if (length == 0) {
            location.href = location.origin+"/worksnotes/login.php";
        } // checklogin
    });
</script>