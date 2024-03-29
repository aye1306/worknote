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
                <div class="row no-gutters px-1 mt-3">
                    <!--row-->
                    <div class="col-md">
                    <div class="card px-1">
                            <div class="card-body">
                                <p class="card-title mb-3 h4"><strong>ระบุรายละเอียดงาน</strong></p>
                                <div class="row align-items-center d-flex justify-content-start" id="work_type"> 
                                    
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                        <label class="form-label h6" for="subject"><strong>วิชา : </strong></label>
                                        <input id="subject" class="form-control" type="text" placeholder="กรอกวิชา"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                        <label class="form-label h6" for="w_name"><strong>ชื่องาน : </strong></label>
                                        <input id="w_name" class="form-control" type="text" placeholder="กรอกชื่องาน"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="input-wrap">
                                            <label class="form-label h6" for="deadline"><strong>วันที่ : </strong></label>
                                            <input type="date" id="deadline"class="form-control appointment_date" placeholder="เดดไลน์งาน วันที่" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                        <label class="form-label h6" for="time"><strong>เวลา : </strong></label>
                                        <input id="time" class="form-control" type="time" placeholder="กรอกเวลา"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label h6" for="desc"><strong>รายละเอียดงาน : </strong></label>
                                            <textarea id="desc" cols="30" rows="6" class="form-control" placeholder="รายละเอียดงาน (ใส่ไม่ใส่ก็ได้)"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-success btn-block confirm-button mt-4"  onclick="addwork()">เพิ่มงาน &nbsp;<i class="fas fa-plus"></i></button>
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
    work_type();
    selectActiveNavBar(2); 
    });
</script>