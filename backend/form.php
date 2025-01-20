<?php

include('../resources/conn.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
   $name=$_POST['name'];
   $email=$_POST['email'];
   $number=$_POST['number'];
   $service_category=$_POST['service_category'];
   $message=$_POST['message'];
   $form_stmt=$conn->prepare("INSERT INTO appointments (full_name,email_address,phone_number,service_category,message) VALUES (?,?,?,?,?)");
   $form_stmt->bind_param('sssss',$name,$email,$number,$service_category,$message);
   $form_stmt->execute();
   $form_stmt->close();
   header('Location: ../');

}

?>