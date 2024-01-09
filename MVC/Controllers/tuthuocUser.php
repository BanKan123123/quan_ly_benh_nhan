<?php
    class tuthuocUser extends controller {
        protected $ls;
        function __construct()
        {
            $this->ls=$this->model('tuthuocUserModel');
        }

        // http://localhost/ManagerPatientPHP/medicalBox/Get_data?page=1
        function Get_data () {
            $this->view('MasterLayout', [
                'page' => 'tuthuocUser',
                'data' => $this->ls->medicalBox_find('', '')
            ]);
        }

        // http://localhost/ManagerPatientPHP/medicalBox/Insert_data
       
       

        function timKiem () {
            if(isset($_POST['btnSearch'])) {
                $tt = $_POST['txtSearch'];
                $this->view('MasterLayout', [
                    'page'=> 'tuthuocUser',
                    'tt'=>$tt,
                    'data'=> $this->ls->medicalBox_find('', $tt)
                ]);
            }
        }

        
    }
?>