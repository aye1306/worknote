<!DOCTYPE doctype html>
<html>
    <?php include('include/header.php'); ?>
    <body>
        <div class="page-main w-100">
            <!-- page-main-->
            <?php include('include/navbar.php'); ?>
            <div class="container ">
                <div class="debug" style="margin-top:60px;">
                    <p class="h3 text-center text-secondary"><strong>เข้าสู่ระบบ</strong></p>
                </div>
                <!--container-fluid-->
                <div class="row no-gutters px-2 mt-4 align-items-center d-flex justify-content-center">
                    <!--row-->
                    <div class="col-md-12">
                      <form>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                          <label class="form-label h6" for="username"><strong>ชื่อผู้ใช้งาน</strong></label>
                          <input type="text" id="username" class="form-control" placeholder="กรอกชื่อผู้ใช้ (username)" autocomplete="off" required />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                          <label class="form-label h6" for="password"><strong>รหัสผ่าน</strong></label>
                          <input type="password" id="password" class="form-control" placeholder="กรอกรหัสผ่าน (password)" required/>
                        </div>

                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-4">

                          <div class="col">
                            <!-- Simple link -->
                           
                          </div>
                        </div>

                        <!-- Submit button -->
                        <a type="button" onclick="login()" class="btn btn-primary btn-block mb-4">เข้าสู่ระบบ</a>

                        <!-- Register buttons -->
                        <div class="text-center">
                          <p class="h4">ยังไม่มีบัญชี ? <a href="register.php">สมัครใช้งาน</a></p> 
                          <p class="h5 mb-4"><a href="#!" class="text-danger">ลืมรหัสผ่าน ?</a></p>
                          <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class="fab fa-facebook-f"></i>
                          </button>

                          <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class="fab fa-google"></i>
                          </button>
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