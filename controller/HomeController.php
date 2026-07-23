<?php

require_once 'model/DoctorModel.php';

class HomeController
{
    // Home Page
    public function index()
    {
        $doctorModel = new DoctorModel();

        // Database থেকে সব doctor আনবে
        $doctors = $doctorModel->getAllDoctors();

        include 'view/home/index.php';
    }

    // All Doctors Page
    public function doctors()
    {
        $doctorModel = new DoctorModel();

        $doctors = $doctorModel->getAllDoctors();

        include 'view/home/doctors.php';
    }
}