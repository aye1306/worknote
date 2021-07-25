$(function(){
    /*เมื่อปุ่มปิด หรือ เปิด เมนูด้านซ้ายถูกคลิก*/
    $(".close-l-sidenav,.open-l-sidenav").on("click",function(){
        $("html").css("overflow-x","hidden"); /*ป้องกันการแสดง scroolbar ในแนวนอน*/
        $(document.body).css({"position":"relative","overflow-x":"hidden"});    /*ป้องกันการแสดง scroolbar ในแนวนอน*/  
        var toggleWidth = ($(".l-sidenav").width()==0)?250:0;
        $(".l-sidenav").width(toggleWidth);     
        var toggleMarginLeft = toggleWidth; /*ให้ขยับส่วนของคลุมดำออกไปเท่ากับความกว้างของเมนูที่ขยับเข้ามา*/
        var toggleOverlayWidth = ($(".page-overlay-bg").width()==0)?"100%":0; /*ซ่อนหรือแสดงโดยการกำหนดค่าความกว้าง*/
        var fullHeight = $(".page-main").height(); /* ความสูงของเนื้อหา*/
        $(".page-main").css("margin-left",toggleMarginLeft); /*ขยับส่วนของเนื้อหาตามการแสดงของเมนูด้านซ้าย*/
        $(".page-overlay-bg").height(fullHeight); /*ให้ความสูงของพื้นที่คลุมดำเท่ากับเนื้อหา*/
        $(".page-overlay-bg").width(toggleOverlayWidth); /*ให้ความกว้างของพื้นที่คลุมดำเท่ากับ 100% หรือ 0*/               
    });
     
    /*เมื่อปุ่มปิด หรือ เปิด เมนูด้านขวาถูกคลิก*/  
    $(".close-r-sidenav,.open-r-sidenav").on("click",function(){
        /*กำหนดเงื่อนไข กรณีแสดงแบบเต็มจอ ถ้าความกว้างเริ่มต้นเป็น 0 ให้แสดง 100% */
        var toggleWidth = ($(".r-sidenav").width()==0)?"100%":0;
        $(".r-sidenav").width(toggleWidth);
    }); 
     
});