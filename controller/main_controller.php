<?php
    class MainController {
        public function login() {
            if(isset($_POST["btnLogin"])){
                $username = filter_input(INPUT_POST, "username") ? filter_input(INPUT_POST, "username") : "";
                $password = filter_input(INPUT_POST, "password") ? filter_input(INPUT_POST, "password") : "";
                $user = Main::login($username, $password); //the variables reqiured to log into the system
                if(!$user) {
                    require_once('view/login.php'); //call for reload of login page
                } else {
                    if (strtolower($user->role) == "admin") {
                        //Send to admin page
                       // echo "<script> document.location.href='?controller=admin&action=viewLecturer'; </script>";
                       require_once("view/admin/adminMain.php");
                    } else if(strtolower($user->role) == "lecturer") {
                        //send to lecturer page
                        require_once("view/lecturer/lecturer.php");
                    } else if(strtolower($user->role) == "student"){
                        //send to student page
                        require_once("view/student/student.php");
                    }else {
                        echo "Who is this?";
                    }
                    $_SESSION["user"] = $user->user;
                    $_SESSION["role"] = $user->role;
                    $_SESSION["pass"] = $user->pass;
                } 
            }else {
                require_once('view/login.php');
            }
        }

        public function logout() {
            if(isset($_POST["logout"])){
                unset($_SESSION["user"]);
                unset($_SESSION["role"]);
                unset($_SESSION["pass"]);
                require_once('view/login.php');
            }
        }
    }
?>