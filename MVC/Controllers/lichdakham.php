<?php 
    class lichdakham extends controller {
        protected $ls;

        function __construct () {
            $this->ls = $this->model('lichdakhamModel');
        }

        function Get_data () {
            $this->view('MasterLayout', [
                'page'=> 'lichdakham',
                'data'=> $this->ls->getdata()
            ]);
        }

        function timkiem () {
            if(isset($_POST['btnSearch'])) {
                $mlh = $_POST['txtSearch'];
                $this->view('MasterLayout', [
                    'page'=> 'lichdakham',
                    'data'=> $this->ls->find($mlh),
                    'mlh' => $mlh
                ]);
            }
        }
    }
?>