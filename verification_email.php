<?php include "header.php"; ?>
<div class="container mt-5" style="box-shadow: 10px 10px 10px 10px; border-radius:10px">
    <div class="m-2">
        <div class="col-12 text-center mb-3">
            <span class="fw-bold fs-3">Verification</span>
        </div>
        <div class="row input-group mb-3">
            <span class="input-group-text col" id="basic-addon1">Verification Code :
            <input type="text" id="verificationCode" class="form-control w-100"></span>
        </div>
        <div class="text-center mt-3  mb-3">
            <button type="button" id="submitBtn" class="btn btn-danger col-4 mb-3">Submit</button>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#submitBtn").click(function(){
           var verificationCode = $("verificationCode").val();
           if(verificationCode==""){
            alert("Please enter verification code");
           }
           else{
                $.ajax({
                   url: "assets/library/user_login_register_function.php",
                    method: "POST",
                    data: {insert_verification_code:verificationCode},
                    success: function (data) {
                        var da = JSON.parse(data);
                        if(da.status_code==200){
                            alert("Registration Success");
                            window.location.href="login.php";
                        }
                        else{
                            alert("Invalid Verification Code.");
                        }
                    }  
                });
           }
        });
    });
</script>
<?php include "footer.php"; ?>
