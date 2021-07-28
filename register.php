<!DOCTYPE doctype html>
<html>
    <?php include('include/header.php'); ?>
    <body>
        <div class="page-main w-100">
            <!-- page-main-->
            <?php include('include/navbar.php'); ?>
            <div class="container ">
                <div class="debug" style="margin-top:60px;">
                    <p class="h3 text-center text-secondary"><strong>สมัครสมาชิก</strong></p>
                </div>
                <!--container-fluid-->
                <div class="row no-gutters px-2 mt-4 align-items-center d-flex justify-content-center">
                    <!--row-->
                    <div class="col-md-12">
                      <form>
                        <!-- Email input -->
                        <div class="form-outline mb-3">
                          <label class="form-label h6 text-primary" for="email"><i class="fas fa-at"></i><strong> อีเมล</strong></label>
                          <input type="email" id="email" class="form-control" placeholder="กรอกอีเมล (email)" autocomplete="off" />
                        </div>

                        <div class="form-outline mb-3">
                          <label class="form-label h6 text-primary" for="nickname"><i class="fas fa-user-edit"></i><strong>  ชื่อเล่น</strong></label>
                          <input type="text" id="nickname" class="form-control" placeholder="กรอกชื่อเล่น (nickname)" autocomplete="off" />
                        </div>

                        <div class="form-outline mb-3">
                          <label class="form-label h6 text-primary" for="username"><i class="fas fa-user-plus"></i><strong>  ชื่อผู้ใช้งาน</strong></label>
                          <input type="text" id="user_reg" class="form-control" placeholder="กรอกชื่อผู้ใช้ (username)" autocomplete="off" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                          <label class="form-label h6 text-primary" for="pass"><i class="fas fa-unlock"></i><strong> รหัสผ่าน </strong></label>
                          <input type="password" id="pass_reg" class="form-control" placeholder="กรอกรหัสผ่าน (password)" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                          <label class="form-label h6 text-primary" for="con_pass"><i class="fas fa-lock"></i><strong> ยืนยันรหัสผ่าน </strong></label>
                          <label class="form-label h6 text-success" for="con_pass" id="label_con"></label>
                          <input type="password" id="con_pass" class="form-control" placeholder="ยืนยันรหัสผ่าน (confirm password)" onkeyup="checkpass()" />
                        </div>

                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-4">

                          <div class="col">
                            <!-- Simple link -->
                           
                          </div>
                        </div>

                        <!-- Submit button -->
                        <a type="button" onclick="register()" class="btn btn-primary btn-block mb-4">สมัครสมาชิก</a>

                        <!-- Register buttons -->
                        <div class="text-center">
                          <p class="h4">มีบัญชีผู้ใช้แล้ว ? <a href="login.php">เข้าสู่ระบบ</a></p> 
                        </div>
                      </form>
                    </div>
                </div>
                <!--row-->
            </div>
            <!--container-fluid-->
           
        </div>
        <!-- page-main-->
        <?php include('js/js.php'); ?>
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
        localStorage.clear();
    });
</script>