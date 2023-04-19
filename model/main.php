<?php 
    class Main {
        public $user;
        public $role;
        public $pass;

        function __construct($user, $role, $pass) {
            $this->user = $user;
            $this->role = $role;
            $this->pass = $pass;
        }

        public static function login($username, $password) {
            $conn = Db::getInstance($username, $password);
            if(!$conn) {
                //Error handling
                return;
            } else {
                if(strtolower($username) == "t_super"){
                    $username = "T_SUPER";
                }
                $query = "SELECT granted_role FROM user_role_privs";
                $objParse = oci_parse($conn, $query);
                oci_execute($objParse);
                while($row = oci_fetch_array($objParse))
                    $role[] = $row[0];

                return new Main($username, $role[0], $password);
            }

        }

    }
?>