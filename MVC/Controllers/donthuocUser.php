<?php 
    class donthuocUser extends controller {

        protected $ls;
        function __construct()
        {
            $this->ls=$this->model('donthuocUserModel');
        }

        function Get_data () {
            $this->view ('MasterLayout', [
                'page' => 'donthuocUser',
                'data' => $this->ls->donThuocModel_find ('', '')
            ]);
        }

        function timkiem () {
            if(isset($_POST['btnSearch'])) {
                $tt = $_POST['txtSearch'];
                $this->view ('MasterLayout', [
                    'page' => 'donthuocUser',
                    'data' => $this->ls->donThuocModel_find ('', $tt),
                    'id' => $tt
                ]);
            }
        }
    }
