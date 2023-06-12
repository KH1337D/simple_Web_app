<?php
session_start();
include '../core/function.php';
include '../core/validation.php';
$errors = [];

if(checkRequestMethod('POST') && CheckPostInput('name')){

    foreach($_POST as $key => $value){

        // echo $key .":" . $value . "<br>";

        $$key = sanatizeInput($value);
    
    }
    // echo "name" ;
    if(!requiredVal($name)){
        $errors [] ="name is required";
    }elseif(!minVal($name,3)){
    
        $errors [] = "name must gtreater than 3 chars";
    }
    elseif(!maxVal($name,25)){
    
        $errors [] = "name must smaller than 25 chars";
    }


// echo email
    if(!requiredVal($email)){
        $errors [] ="email is required";
    }elseif(!emailVal($email)){
    
        $errors [] = "please type a valid email";
    }
// echo password
    if(!requiredVal($password)){
        $errors [] = "password is required";
    }elseif(!minVal($password,6)){
    
        $errors [] = "password must gtreater than 6 chars";
    }
    elseif(!maxVal($password,20)){
    
        $errors [] = "password must smaller than 20 chars";
    }


    if(empty($errors)){
       
        $users_file = fopen("../data/users.csv","a+");
        $data = [$name,$email,sha1($password)];
        fputcsv($users_file,$data);
        $_SESSION['auth'] = [$name,$email];
        redirect("../index.php");

    }else{

        $_SESSION['errors'] = $errors;
        redirect("../register.php");
    }
    
    }else{

    echo "not support";
}