<?php
class Home extends controller
{
    function Get_data()
    {
        $this->view('taikhoan_v', [
            'page' => 'dangnhap'
        ]);
    }

    function homeuser()
    {
        $this->view('MasterLayout', [
            'page' => 'HomeUser_v'
        ]);
    }
}
