<?php
 include "server_connect.php"; 
 include "all_function.php"; 

 if(isset($_POST['insert_into_register_table'])){
    $username = $_POST['insert_into_register_table'];
    $email = $_POST['email'];
    $password= $_POST['password'];
    $contact = $_POST['contact'];
    $id = get_primary_id("users");
    if($username==""||$email==""||$password==""||$contact==""){
        return false;
    }
    else{
         $check_exists_qry = "SELECT IF (EXISTS(SELECT * FROM users WHERE `email`='$email' or `contact` = '$contact'),1,0)as result;";
         $check_exists_req = check_if_exist($check_exists_qry);
         if($check_exists_req==1){
            $response = give_response(55);
            echo json_encode($response);
         }
         else if($check_exists_req==0){
            $registration_qry = "INSERT INTO `users`(`id`, `username`, `email`, `passwords`, `contact`) VALUES ('$id','$username','$email','$password','$contact');";
            $conn = dbConnecting();
            $registration_req = mysqli_query($conn, $registration_qry);
            if ($registration_req) {
                $verification_qry="";
                $response = give_response(200);
                echo json_encode($response);
            } else {
                $msg = mysqli_error($conn);
                $code = check_ecxeptions($msg);
                $response = give_response($code);
                echo json_encode($response);
            }
         }
    }
 }


 if(isset($_POST['insert_verification_code'])){
    $verificationCode = $_POST['insert_verification_code'];
    if($$verificationCode==""){
        return false;
    }
    else{
         $check_exists_qry = "SELECT IF (EXISTS(SELECT * FROM users WHERE `email`='$email' or `contact` = '$contact'),1,0)as result;";
         $check_exists_req = check_if_exist($check_exists_qry);
         if($check_exists_req==1){
            $response = give_response(55);
            echo json_encode($response);
         }
         else if($check_exists_req==0){
            $registration_qry = "INSERT INTO `users`(`id`, `username`, `email`, `passwords`, `contact`) VALUES ('$id','$username','$email','$password','$contact');";
            $conn = dbConnecting();
            $registration_req = mysqli_query($conn, $registration_qry);
            if ($registration_req) {
                $response = give_response(200);
                echo json_encode($response);
            } else {
                $msg = mysqli_error($conn);
                $code = check_ecxeptions($msg);
                $response = give_response($code);
                echo json_encode($response);
            }
         }
    }
 }

 ?>