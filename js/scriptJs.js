queryWork()
async function queryWork(){
	let des = null;
	let userId = JSON.parse(localStorage.getItem("UserData")).user_id;
	const {data} = await axios.get(location.origin+"/worksnotes/src/QueryWorklast.php?user_id="+userId);
  if(data.status === 0){
    $("#w_size_span").append(0);
  }else{
    $("#w_size_span").append(data.data.length);
    data.data.forEach((val,i)=>{
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
      const send_data = {
        "user":user,
        "pass":pass,"section":"login"
      } 
      axios.post(location.origin+"/worksnotes/src/ControllerHome.php", 
                JSON.stringify(send_data)                
      ).then(function(response) {
        console.log(response.data);
        const jsonob = response.data;
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
      const send_data = {
        "email":email,"user":user,
        "pass":pass,"nickname":nickname,"section":"register"
      } 
      axios.post(location.origin+"/worksnotes/src/ControllerHome.php", 
                JSON.stringify(send_data)                
      ).then(function(response) {
        console.log(response.data);
        const jsonob = response.data;
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

async function work_type(){
  const send_data = {
    "section":"worktype"
  } 
  axios.post(location.origin+"/worksnotes/src/ControllerHome.php", 
            JSON.stringify(send_data)                
  ).then(function(res) {
    const result = res.data;
    
    result.data.forEach((val,i)=>{
      $("#work_type").append(
        '<div class="col-6">'
        +'  <label class="radio mr-1"> '
        +'      <input type="radio" name="w_type" id="w_type" value="'+val.wt_id+'">'
        +'      <span style="font-size:20px;">'
        +'          <strong>&nbsp;<i class="fas fa-file-alt text-primary"></i>&nbsp; '+val.wt_name+'</strong>'
        +'      </span> '
        +'  </label>'
        +'</div>'
      );
    })
  }); // then
}


async function addwork(){
  const subject = $("#subject").val();
  const workname = $("#w_name").val();
  const deadline = $("#deadline").val();
  const time = $("#time").val();
  const desc = $("#desc").val();
  var w_type = $("input[name='w_type']:checked").val();
  
  if (w_type == undefined) {
    Swal.fire({
      icon: 'info',
      title: 'เลือกประเภทงาน',
      text: 'ตรวจสอบว่าเลือกประเภทงานแล้ว !!'
    })
  }else if (subject == '') {
     Swal.fire({
      icon: 'info',
      title: 'กรอกวิชา',
      text: 'ตรวจสอบว่ากรอกวิชาแล้ว !!'
    })
   }else if (workname == '') {
     Swal.fire({
      icon: 'info',
      title: 'กรอกชื่องาน',
      text: 'ตรวจสอบว่ากรอกชื่องานแล้ว !!'
    })
  }else if (deadline == '') {
     Swal.fire({
      icon: 'info',
      title: 'เลือกวันที่',
      text: 'ตรวจสอบว่าเลือกวันที่แล้ว !!'
    })
  }else if (time == '') {
     Swal.fire({
      icon: 'info',
      title: 'เลือกเวลา',
      text: 'ตรวจสอบว่าเลือกเวลาแล้วแล้ว !!'
    })
  }else{
    const user_id = JSON.parse(localStorage.getItem("UserData")).user_id;
    const send_data = {
      "subject":subject,"workname":workname,"deadline":deadline,"user_id":user_id,
      "time":time,"desc":desc,"w_type":w_type,"section":"addwork"
    } 
    axios.post(location.origin+"/worksnotes/src/ControllerHome.php", 
              JSON.stringify(send_data)                
    ).then(function(response) {
      console.log("data= "+response.data);
      if (response.data == "1") {
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'เพิ่มงานสำเร็จ',
          text: 'กำลังโหลดอีกครั้ง',
          showConfirmButton: false,
          timer: 2000
        });
        setTimeout(function(){ 
          location.href = location.origin+"/worksnotes/";
        }, 2100);
      }else if (response.data == "lastdate") {
        Swal.fire({
          icon: 'info',
          title: 'ไม่สามารถเพิ่มงานได้',
          text: 'คุณใส่วันที่ ที่ผ่านมาแล้ว !!'
        })
      }else{
        Swal.fire({
          icon: 'error',
          title: 'ไม่สามารถเพิ่มงานได้',
          text: 'ตรวจสอบการกรอกข้อมูล !!'
        })
      }
    });

  }

}

//Controller Navbar
function selectActiveNavBar(item) {
    $( "#nav-footter"+item ).even().removeClass( "text-dark" );
    $( "#nav-footter"+item ).addClass("text-light");
}

async function querySizeWork() {
  const userId = JSON.parse(localStorage.getItem("UserData")).user_id;
  const send_data = {
    "user_id":userId,"section":"querySizeWork"
  } 
  
  axios.post(location.origin+"/worksnotes/src/ControllerHome.php", 
  JSON.stringify(send_data)                
  ).then(function(res) {
    $("#w_warning").append(res.data.result[0].count);
    $("#w_success").append(res.data.result[1].count);
    $("#w_danger").append(res.data.result[2].count);
  });
 

}


async function checkWork(){
	let des = null;
	let userId = JSON.parse(localStorage.getItem("UserData")).user_id;
	const {data} = await axios.get(location.origin+"/worksnotes/src/QueryWorklast.php?user_id="+userId);
  
    data.data.forEach((val,i)=>{
      if (val.w_des == "") {
        des = '<h5 class="text-danger">ไม่ได้ใส่รายละเอียด</h5>';
      }else{
        des =  '<h5 class="text-dark">'+val.w_des+'</h5>';
      }
      $("#checkWorkModal").append(
        ` <div class="col-md-6">
          <div class="card mb-3 ml-1 mr-1 shadow rounded">
                      <div class="card-body" style="background-color:#C0EEFF;" aria-controls="work_show-${val.w_id}" aria-expanded="true" data-toggle="collapse" href="#work_show-${val.w_id}">
                          <h5 class="card-subtitle text-primary">
                            <strong>วิชา ${val.w_subject}  : 
                              <span class="text-dark" style="font-size:18px;">${val.w_name}
                                  <i class="fa fa-hourglass-end align-items-center d-flex justify-content-end" style="font-size:15px;color:#EA9017;">
                                  </i>
                              </span>
                            </strong>
                         </h5>
                          <span class="text-secondary" style="font-size:18px;" id="deadline"><b>${conversDate(val.w_date)}</b></span><br>
                          <span class="text-info">  เหลือเวลาอีก <b class="text-danger"> ${val.time} </b> วัน </span>
                      </div>
                      <div class="collapse" id="work_show-${val.w_id}">
                          <div class="card-footer bg-light">
                            <div class="align-items-center d-flex justify-content-center">
                             ${des}
                            </div>
                            <div class="align-items-center d-flex justify-content-between mt-4">
                              <button type="button" class="btn btn-warning btn-sm" onclick="updateModalGetValue('${val.w_id}','${val.w_name}','${val.w_date}','${val.w_des}')">แก้ไขงาน</button>
                              <button type="button" class="btn btn-danger btn-sm">ลบงาน</button>
                            </div>
                          </div>
                      </div>
                  </div>
            </div>
          `
      );
    })

}

function updateModalGetValue(w_id,w_name,w_date,w_desc){
  console.log(w_name,w_id,w_date);
  $('#updateWorkmodal').modal('show');
  $('#u_name').val(w_name);
  $('#u_id').val(w_id);
  const current = w_date.split(" ");
  const date = current[0];
  const time = current[1];

  const u_date = date.split("-");
  console.log("'"+u_date[0]+"-"+u_date[1]+"-"+u_date[2]+"'");
  document.getElementById('u_date').value = u_date[0]+"-"+u_date[1]+"-"+u_date[2];
  $('#u_time').val(time);
  $('#u_desc').val(w_desc);

}



function editWork() {
  const w_id = $('#u_id').val();
  const w_name = $('#u_name').val();
  const deadline = $("#u_date").val();
  const time = $("#u_time").val();
  const desc = $("#u_desc").val();

  const send_data = {
    "workname":w_name,"deadline":deadline,"workId":w_id,
    "time":time,"desc":desc,"section":"editWork"
  }

  if (w_name == '') {
    Swal.fire({
      icon: 'info',
      title: 'กรอกชื่องาน',
      text: 'ตรวจสอบว่ากรอกชื่องานแล้ว !!'
    })
  }else if (deadline == '') {
    Swal.fire({
      icon: 'info',
      title: 'เลือกวันที่',
      text: 'ตรวจสอบว่าเลือกวันที่แล้ว !!'
    })
   }else if (time == '') {
    Swal.fire({
      icon: 'info',
      title: 'เลือกเวลา',
      text: 'ตรวจสอบว่าเลือกเวลาแล้วแล้ว !!'
    })
  }else {
    console.log("send_Data : ",send_data)

    axios.post(location.origin+"/worksnotes/src/ControllerHome.php", 
              JSON.stringify(send_data)                
    ).then(function(response) {

    });

    axios.post(location.origin+"/worksnotes/src/ControllerHome.php", 
      JSON.stringify(send_data)
    ).then(function(res){
      if (res.data == "1") {
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'แก้ไขงานสำเร็จ',
          text: 'กำลังโหลดหน้าใหม่',
          showConfirmButton: false,
          timer: 2000
        });
        setTimeout(function(){ 
          location.reload();
        }, 2100);
      }else if (res.data == "lastdate") {
        Swal.fire({
          icon: 'info',
          title: 'ไม่สามารถแก้ไขงานได้',
          text: 'คุณใส่วันที่ ที่ผ่านมาแล้ว !!'
        })
      }else{
        Swal.fire({
          icon: 'error',
          title: 'ไม่สามารถแก้ไขงานได้',
          text: 'ตรวจสอบการกรอกข้อมูล !!'
        })
      }
    })
  }

}
