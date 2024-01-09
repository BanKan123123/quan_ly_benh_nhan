<?php
class HomeAdmin extends controller
{
    protected $ls;

    function __construct()
    {
        $this->ls = $this->model('homeAdminModel');
    }

    function Get_data()
    {
        $this->view('MasterLayout', [
            'page' => 'HomeAdmin_v',
            'getListPatients' => $this->getListPatients(),
            'getPrescriptionListForMonth' => $this->getPrescriptionListForMonth(),
            'getDrugListExpired' => $this->getDrugListExpired(),
            'getCountDrugList' => $this->getCountDrugList(),
            'getMedicalScheduleListForMonth' => $this->getMedicalScheduleListForMonth(),
        ]);
    }

    function getListPatients()
    {
        $patients = mysqli_num_rows($this->ls->getListPatient());
        return $patients;
    }

    function getPrescriptionListForMonth()
    {
        $prescription = mysqli_num_rows($this->ls->getPrescriptionListForMonth());
        return $prescription;
    }

    function getDrugListExpired()
    {
        $drugExpried = mysqli_num_rows($this->ls->getDrugListExpired());
        return $drugExpried;
    }

    function getCountDrugList()
    {
        $drugs = mysqli_num_rows($this->ls->getCountDrugList());
        return $drugs;
    }

    function getMedicalScheduleListForMonth()
    {
        $medicalSchedule = mysqli_num_rows($this->ls->getMedicalScheduleListForMonth());
        return $medicalSchedule;
    }
}
