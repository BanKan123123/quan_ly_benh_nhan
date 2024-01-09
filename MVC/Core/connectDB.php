<?php 
    class connectDB{
        public $con;
        protected $servername="localhost";
        protected $username="root";
        protected $password="";
        protected $dbname="managerpatient";
        function __construct(){
            $this->con=mysqli_connect($this->servername,$this->username,$this->password,$this->dbname);
            mysqli_query($this->con,"SET NAMES 'utf8'");
        }
    }
?>