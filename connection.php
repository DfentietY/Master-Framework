<?php
    class Db {
        private static $instance = NULL;
        private static $adminInstance = NULL;
        
        private function __construct() {}
        
        private function __clone() {}
        
        public static function getInstance($user, $pass) {
            ini_set('display_errors', 'OFF');
            if (!isset(self::$instance)) {
                if(strtolower($user) != "t_super"){
                    $user = '"'.$user.'"';
                    $pass = '"'.$pass.'"';
                }
                self::$instance = oci_connect($user, $pass);
            }
            if(!self::$instance){
                $e = oci_error();
                //send to page for display
                ///remember to change the connection error to a more user friendly message
                echo '<div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3>Connection Error</h3>
                        <p>'.$e['message'].'</p>
                      </div>';
            }else {
                return self::$instance;
            }
        }

        public static function getAdminInstance() {
            ini_set('display_errors', 'OFF');
            if(!isset(self::$adminInstance)){
                self::$adminInstance = oci_connect('T_super', 'T_super');
            }
            if(!self::$adminInstance){
                $e = oci_error();
                echo '<div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3>Connection Error</h3>
                        <p>'.$e["message"].'</p>
                     </div>';
            }else {
                return self::$adminInstance;
            }
        }
    }
?>