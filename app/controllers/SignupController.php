<?php

class SignupController extends Controller
{

    public function receiverSignupForm()
    {
        return view('receiver.auth.signup');
    }

    public function hospitalSignupForm()
    {
        return view('hospital.auth.registration');
    }

    public function receiverSignup()
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email_id = $_POST['email_id'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $phone = $_POST['phone'];
        $blood_group = $_POST['blood_group'];
        $sql_query = "INSERT into receiver(fname,lname,email, password,phone,blood_group) values('$fname','$lname','$email_id', '$password', '$phone', '$blood_group');";
        if (mysqli_query($this->db, $sql_query)) {
            $_SESSION['notification'] = array();
            array_push($_SESSION['notification'], "Signup successful.");
            array_push($_SESSION['notification'], "Enter details to Login.");
            header("Location: /login");
        } else {
            errorHandler("/signup", "Signup failed.");
        }
    }

    public function hospitalSignup()
    {
        $name = $_POST['name'];
        $email_id = $_POST['email_id'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $sql_query = "INSERT INTO hospital(name, email, password, address, phone) values('$name','$email_id','$password','$address','$phone');";
        if (mysqli_query($this->db, $sql_query)) {
            $_SESSION['notification'] = array();
            array_push($_SESSION['notification'], "Signup successful.");
            array_push($_SESSION['notification'], "Enter details for Login.");
            header("Location: /hospital/login");
        } else {
            errorHandler("hospital/signup", "Restaurant signup failed.");
        }
    }
}
