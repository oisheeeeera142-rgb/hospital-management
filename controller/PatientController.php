<?php

require_once 'model/PatientModel.php';
require_once 'model/DoctorModel.php';
require_once 'model/AppointmentModel.php';
require_once 'model/PrescriptionModel.php';

class PatientController
{
    private $patientModel;
    private $doctorModel;
    private $appointmentModel;
    private $prescriptionModel;

    public function __construct()
    {
        $this->patientModel =
            new PatientModel();

        $this->doctorModel =
            new DoctorModel();

        $this->appointmentModel =
            new AppointmentModel();

        $this->prescriptionModel =
            new PrescriptionModel();
    }

    // DASHBOARD

    public function dashboard()
{
    if(isset($_GET['search']) && !empty($_GET['search']))
    {
        $keyword = trim($_GET['search']);

        $doctors =
            $this->doctorModel
                 ->searchDoctor($keyword);
    }
    else
    {
        $doctors =
            $this->doctorModel
                 ->getAllDoctors();
    }

    $appointments =
        $this->appointmentModel
             ->getAllAppointments();

    $prescriptions =
        $this->prescriptionModel
             ->getAllPrescriptions();

    include 'view/patient/dashboard.php';
}

    // APPOINTMENT HISTORY

   public function appointmentHistory()
{
    $appointments =
        $this->appointmentModel
             ->getAllAppointments();

    // PAGINATION FIX
    $totalPages = 1;

    include
    'view/patient/appointment_history.php';
}
    // PRESCRIPTIONS

    public function prescriptions()
    {
        $prescriptions =
            $this->prescriptionModel
                 ->getAllPrescriptions();

        include
        'view/patient/prescriptions.php';
    }

    // PROFILE

    public function profile()
    {
        include
        'view/patient/profile.php';
    }
}