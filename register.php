<?php include "header.php"; ?>
<div class="container mt-5" style="box-shadow: 10px 10px 10px 10px; border-radius:10px">
    <div class="m-2">
        <div class="col-12 text-center mb-3">
            <span class="fw-bold fs-3">Register</span>
        </div>
        <div class="row input-group mb-3">
            <span class="input-group-text col me-2" id="basic-addon1">Username :
            <input type="text" id="username" class="form-control w-100"></span>
            <span class="input-group-text col" id="basic-addon1">Email :
            <input type="email" id="email" class="form-control w-100"></span>
        </div>
        <div class="row input-group mb-3">
            <span class="input-group-text col me-2" id="basic-addon1">Contact :
            <input type="text" id="contact" class="form-control w-100"></span>
            <span class="input-group-text col me-2" id="basic-addon1">Password :
            <input type="password" id="password" class="form-control w-100"></span>
        </div>
        <div class="text-center mt-3  mb-3">
            <button type="button" id="submitBtn" class="btn btn-danger col-4 mb-3">Submit</button>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#submitBtn").click(function(){
            var username = $("#username").val();
            var email = $("#email").val();
            var password = $("#password").val();
            var contact = $("#contact").val();
            if(username==""|| email==""|| password==""|| contact==""){
                alert("Please fill the form properly.");
            }
            else{
                $.ajax({
                   url: "assets/library/user_login_register_function.php",
                    method: "POST",
                    data: {insert_into_register_table:username,email:email,password:password,contact:contact},
                    success: function (data) {
                        // console.log(data);
                        var da = JSON.parse(data);
                        if(da.status_code==200){
                            // alert("Registration Success");
                            window.location.href="verification_email.php";
                        }
                        else{
                            alert("Some fields are duplicate or invalid.");
                        }
                    }  
                });
            }
        });
    });
</script>
<?php include "footer.php"; ?>
