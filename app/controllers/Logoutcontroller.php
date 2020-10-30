<?php
    class LogoutController extends Controller
    {
        public function logout(){
            session_destroy();
            header("LOCATION: /");
        }
    }
