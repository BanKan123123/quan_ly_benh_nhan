<?php

class bacsiUser extends controller
{
    protected $ls;

    function __construct()
    {
        $this->ls = $this->model('bacsiUserModel');
    }

    function getDataDoctors()
    {
        $result = $this->ls->getDataDoctors();
        return $result;
    }

    function getDataExport()
    {
        $listExport = array();
        $data = $this->getDataDoctors();
        if (mysqli_num_rows($data) > 0) {
            while ($row = mysqli_fetch_array($data)) {
                array_push($listExport, $row);
            }
        }
        return $listExport;
    }

    function getDataKhoa()
    {
        $result = $this->ls->getDataKhoa();
        return $result;
    }

    function getDoctorById($id)
    {
        $result = $this->ls->checkIdentical($id);
        return $result;
    }

    function Get_data()
    {
        $this->view('Masterlayout', [
            'page' => 'bacsiUser',
            'data' => $this->getDataDoctors(),
            'dataSpec' => $this->getDataKhoa(),
            'listExport' => $this->getDataExport()
        ]);
    }


    function timkiem()
    {
        $keyword = $_POST['keyword'];
        $result = $this->ls->getListDataByKeyWord($keyword);
        $this->view('Masterlayout', [
            'page' => 'bacsiUser',
            'data' =>  $result,
            'keyword' => $keyword,
            'dataSpec' => $this->getDataKhoa(),
            'listExport' => $this->getDataExport()
        ]);
    }
}