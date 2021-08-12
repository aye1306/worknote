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
                    <p class="h3 text-center text-secondary"><strong>บัญชีงาน</strong></p>
                </div>
                <hr>
                <div class="row no-gutters px-1 mt-3"> <!--row-->
                    <div class="col-md-12">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center" data-toggle="modal" data-target="#showWorkDoing">
                                <h4><strong>งานที่ต้องทำ</strong></h4>
                                <h5><span class="badge badge-warning badge-pill" id="w_warning"></span></h5>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <h4><strong>งานที่ทำเสร็จไปแล้ว</strong></h4>
                                <h5><span class="badge badge-success badge-pill" id="w_success"></span></h5>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <h4><strong>งานที่หมดเขตส่ง</strong></h4>
                                <h5><span class="badge badge-danger badge-pill" id="w_danger"></span></h5>
                        </li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <!-- Modal -->
                        <div class="modal fade" id="showWorkDoing" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLongTitle">ปรับแก้งานที่ต้องทำ</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" id="checkWorkModal">
                                            <!--row-->
                                            

                                        </div>
                                        <div class="row h-25"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <!-- Modal -->
                        <div class="modal fade" id="updateWorkmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLongTitle">ปรับแก้งานที่ต้องทำ</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
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
                                            <button class="btn btn-warning btn-block confirm-button mt-4"  onclick="editWork()">แก้ไขงาน &nbsp;<i class="fas fa-edit"></i></button>
                                        </div>
                                        <div class="row h-25"></div>
                                    </div>
                                </div>
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
        selectActiveNavBar(3); 
        querySizeWork();
        checkWork();
    });
</script>