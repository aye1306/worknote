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
                    <p class="h3 text-center text-secondary"><strong>งานที่ต้องทำ</strong></p>
                </div>
                <hr>
                <div class="row no-gutters px-1 mt-3" id="work">
                    <!--row-->
                    

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
        selectActiveNavBar(1) 
    });
</script>