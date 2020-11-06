<?php

class LoginController extends Controller
{

    public function receiverLoginForm()
    {
        return view('receiver.auth.login');
    }

    public function hospitalLoginForm()
    {
        return view('hospital.auth.login');
    }

    public function receiverLogin()
    {
        $email_id = $_POST['email_id'];
        $password = $_POST['password'];

        $sql_query = "select * from receiver where email='$email_id'";
        $user = mysqli_query($this->db, $sql_query);
        $url = $_SERVER['REQUEST_URI'];

        if (mysqli_num_rows($user) > 0) {
            $user = mysqli_fetch_assoc($user);

            if (password_verify($password, $user['password'])) {
                $_SESSION['Auth'] = $user['id'];
                $_SESSION['username'] = $user['fname'];
                $_SESSION['type'] = "receiver";
                header("Location: /");
                
            } else
                errorHandler($url, "Email or Password did not match");
        } else {
            errorHandler($url, "Email did not match.");
        }
    }


    public function hospitalLogin()
    {
        $email_id = $_POST['email_id'];
        $password = $_POST['password'];
        $sql_query = "select * from hospital where email='$email_id';";
        $result = mysqli_query($this->db, $sql_query);

        $url = $_SERVER['REQUEST_URI'];

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            if (password_verify($password, $row['password'])) {
                $_SESSION['Auth'] = $row['id'];
                $_SESSION['username'] = $row['name'];
                $_SESSION['type'] = "hospital";
                header('Location: /hospital/dashboard');
            } else {
                errorHandler($url, "Email or Password did not match");
            }
        } else {
            errorHandler($url, "Email did not match.");
        }
    }
}
