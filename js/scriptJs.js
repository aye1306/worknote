
async function queryWork(){
	let des = null;
	const userId = JSON.parse(localStorage.getItem("UserData")).user_id;
	const {data} = await axios.get(location.origin+"/worksnotes/src/QueryWorklast.php?id="+userId);
	data.forEach((val,i)=>{
		if (val.w_des == "") {
			des = '<h5 class="text-danger">ไม่ได้ใส่รายละเอียด</h5>';
		}else{
			des =  '<h5 class="text-dark">'+val.w_des+'</h5>';

		}
		$("#work").append(
			'<div class="col-md-6">'
            +'    <div class="card mb-3 ml-1 mr-1 shadow rounded">'
            +'        <div class="card-body" style="background-color:#C0EEFF;" aria-controls="work_show-'+val.w_id+'" aria-expanded="true" data-toggle="collapse" href="#work_show-'+val.w_id+'">'
            +'            <h5 class="card-subtitle text-primary">'
            +'              <strong>วิชา '+val.w_subject +' : '
            +'                <span class="text-dark" style="font-size:18px;"> '+val.w_name
            +'                    <i class="fa fa-hourglass-end align-items-center d-flex justify-content-end" style="font-size:15px;color:#EA9017;">'
            +'                    </i>'
            +'                </span>'
            +'              </strong>'
            +'           </h5>'
            +'            <span class="text-secondary" style="font-size:18px;" id="deadline"><b>'+conversDate(val.w_date)+'</b></span><br>'
            +'            <span class="text-info">  เหลือเวลาอีก <b class="text-danger"> '+val.time+' </b> วัน </span>'
            +'        </div>'
            +'        <div class="collapse" id="work_show-'+val.w_id+'">'
            +'            <div class="card-footer bg-light">'
            +'              <div class="align-items-center d-flex justify-content-center">'
            +'                <h5 class="text-dark">'+des+'</h5>'
            +'              </div>'
            +'              <div class="align-items-center d-flex justify-content-center mt-4">'
            +'                <button type="button" class="btn btn-outline-success btn-sm">ทำเสร็จแล้ว</button>'
            +'              </div>'
            +'            </div>'
            +'        </div>'
            +'    </div>'
            +'</div>'
		);
	})
	$("#w_size_span").append(data.length);
}

function conversDate(call_date){
	const currentDate = String(call_date);
	const datetime = currentDate.split(' ');
	const date =datetime[0];
	const time = datetime[1];
	const breakdate = date.split('-');
	const y = breakdate[0];
	const m = breakdate[1];
	const d = breakdate[2];
	var mm = 0;
	 if (m[0] == 0) {
	 	mon = m.split("0");
	 	mm = mon[1];
	 }else{
	 	mm = m;
	 }

	var monthNamesThai = ["","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน",
	"กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤษจิกายน","ธันวาคม"];

	return "สิ้นสุดวันที่ "+d+" "+monthNamesThai[mm]+" "+y;
}

function login(){
    var user = $("#username").val()
    var pass = $("#password").val()

    if(user == ''){
       Swal.fire(
        'โปรดกรอกชื่อผู้ใช้',
        'ตรวจสอบว่ากรอกชื่อผู้ใช้แล้ว ?',
        'info'
      );
    }else if(pass == ''){
       Swal.fire(
        'โปรดกรอกรหัสผ่าน',
        'ตรวจสอบว่ากรอกรหัสผ่านแล้ว ?',
        'info'
      );
    }else{
      $.ajax({
            type: "POST",
            url: location.origin+"/worksnotes/src/ControllerHome.php",
            data: "user="+user+"&pass="+pass+"&section=login",
            success:function(data){
            	const jsonob = JSON.parse(data);
            	const user = jsonob.user;

            	if (jsonob.status==0) {
            		 Swal.fire({
	                  icon: 'error',
	                  title: 'ไม่สามารถเข้าสู่ระบบได้',
	                  text: 'ตรวจสอบชื่อผู้ใช้หรือรหัสผ่าน !!'
	                })
            	}else{
            		const userData = {
	            		'user_id':user.user_id,
	            		'username':user.username,
	            		'nickname':user.nickname,
	            		'email':user.email,
	            		'time_reg':user.time_reg
            		}
            		localStorage.setItem("UserData",JSON.stringify(userData));
            		localStorage.setItem("status",1);
            		Swal.fire({
	                  position: 'center',
	                  icon: 'success',
	                  title: 'กำลังเข้าสู่ระบบ',
	                  text: 'จะพาไปยังหน้า หน้าแรก',
	                  showConfirmButton: false,
	                  timer: 2000
	                });
	                setTimeout(function(){ 
	                  location.href = location.origin+"/worksnotes"; 
	                }, 2300);
            	}

            }
        });

    }
   
  }



  function logout(){
  	console.log("logout");
  	localStorage.clear();
  	localStorage.setItem("status",0);
  	location.href = location.origin+"/worksnotes/login.php";
  }


  function register(){
    var email = $("#email").val();
    var nickname = $("#nickname").val();
    var user = $("#user_reg").val();
    var pass = $("#pass_reg").val();
    var conpass = $("#con_pass").val();
    
    if(email == ""){
       Swal.fire(
        'โปรดกรอกอีเมล',
        'ตรวจสอบว่ากรอกอีเมลแล้ว ?',
        'info'
      );
    }else if(nickname == ""){
       Swal.fire(
        'โปรดกรอกชื่อเล่น',
        'ตรวจสอบว่ากรอกชื่อเล่นแล้ว ?',
        'info'
      );
    }else if(user == ''){
       Swal.fire(
        'โปรดกรอกชื่อผู้ใช้',
        'ตรวจสอบว่ากรอกชื่อผู้ใช้แล้ว ?',
        'info'
      );
    }else if(pass == ''){
       Swal.fire(
        'โปรดกรอกรหัสผ่าน',
        'ตรวจสอบว่ากรอกรหัสผ่านแล้ว ?',
        'info'
      );
    }else if(conpass == ''){
       Swal.fire(
        'โปรดยืนยันรหัสผ่าน',
        'ตรวจสอบรหัสผ่านขอวคุณ',
        'info'
      );
    }else{

       $.ajax({
            type: "POST",
            url: location.origin+"/worksnotes/src/ControllerHome.php",
            data: "email="+email+"&user="+user+"&pass="+pass+"&nickname="+nickname+"&section=register",
            success:function(data){
            	const jsonob = JSON.parse(data);
            	const status = jsonob.status;

              if (status === 0) {
                Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'สมัครสมาชิกสำเร็จ',
                  text: 'จะพาไปยังหน้า เข้าสู่ระบบ',
                  showConfirmButton: false,
                  timer: 2000
                });
                setTimeout(function(){ 
                  location.href = location.origin+"/worksnotes/login.php";
                }, 2100); 
              }else if(status === "e"){
                Swal.fire({
                  icon: 'error',
                  title: 'รูปแบบอีเมลไม่ถูกต้อง',
                  text: 'โปรดกรอกอีเมลอีกครั้ง !!'
                })
              }else if(status === 1){
                Swal.fire({
                  icon: 'error',
                  title: 'มีชื่อผู้ใช้นี้แล้ว',
                  text: 'โปรดกรอกชื่อผู้ใช้ที่ไม่ซ้ำ !!'
                })
              }
            
        	}
        });
    }
  }



function checkpass(){
 	var pass = $("#pass_reg").val();
    var conpass = $("#con_pass").val();

    if (conpass.length == pass.length) {
       if (pass != conpass) {
       		$("#label_con").empty();
         	$("#label_con").append("รหัสไม่ผ่านตรงกัน");
      		$("#label_con").removeClass("text-success");
         	$("#label_con").addClass("text-danger");
        }else{
        	$("#label_con").empty();
          	$("#label_con").append("รหัสผ่านตรงกัน");
          	$("#label_con").removeClass("text-danger");
          	$("#label_con").addClass("text-success");
        }
    }else if(conpass.length > pass.length){
    	$("#label_con").empty();
      	$("#label_con").append("รหัสไม่ผ่านตรงกัน");
      	$("#label_con").removeClass("text-success");
      	$("#label_con").addClass("text-danger");
    }else if(conpass.length < pass.length){
    	$("#label_con").empty();
      	$("#label_con").removeClass("text-danger");
      	$("#label_con").removeClass("text-success");
    }
   
  }

