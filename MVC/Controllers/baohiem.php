<?php 
    class baohiem extends controller {
        protected $ls;
        function __construct()
        {
            $this->ls=$this->model('baohiemModel');
        }

        function Get_data () {
            $this->view ('MasterLayout', [
                'page' => 'baohiem',
                'data' => $this->ls->find('')
            ]);
        }

        function timkiem () {
            if(isset($_POST['btnSearch'])) {
                $mbh = $_POST['txtSearch'];
                $this->view ('MasterLayout', [
                    'page' => 'baohiem',
                    'data' => $this->ls->find($mbh),
                    'mbh' => $mbh
                ]);
            }
        }
    }
?>