<?php

require_once 'model/DoctorModel.php';
require_once 'model/PatientModel.php';
require_once 'model/AppointmentModel.php';
require_once 'model/AdminModel.php';
require_once 'model/ScheduleModel.php';

class AdminController
{
    private $doctorModel;
    private $patientModel;
    private $appointmentModel;
    private $adminModel;

    public function __construct()
    {
        $this->doctorModel = new DoctorModel();
        $this->patientModel = new PatientModel();
        $this->appointmentModel = new AppointmentModel();
        $this->adminModel = new AdminModel();
    }

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    public function dashboard()
    {
        $doctors = $this->doctorModel->getAllDoctors();
        $totalDoctors = count($doctors);

        $patients = $this->patientModel->getAllPatients();
        $totalPatients = count($patients);

        $appointments = $this->appointmentModel->getAllAppointments();
        $totalAppointments = count($appointments);

        include 'view/admin/dashboard.php';
    }

    /*
    |--------------------------------------------------------------------------
    | Manage Doctors
    |--------------------------------------------------------------------------
    */

    public function manageDoctors()
    {
        $doctors = $this->doctorModel->getAllDoctors();

        include 'view/admin/manage_doctors.php';
    }

    /*
    |--------------------------------------------------------------------------
    | Manage Patients
    |--------------------------------------------------------------------------
    */

    public function managePatients()
    {
        $patients = $this->patientModel->getAllPatients();

        include 'view/admin/manage_patients.php';
    }

    /*
    |--------------------------------------------------------------------------
    | Manage Appointments
    |--------------------------------------------------------------------------
    */

    public function manageAppointments()
    {
        $appointments =
            $this->appointmentModel->getAllAppointments();

        include 'view/admin/manage_appointments.php';
    }

    /*
    |--------------------------------------------------------------------------
    | Approve Appointment
    |--------------------------------------------------------------------------
    */

    public function approveAppointment($id)
    {
        $this->appointmentModel
             ->updateStatus($id, 'approved');

        $_SESSION['success'] =
            "Appointment Approved Successfully";

        header(
            "Location:index.php?page=manage-appointments"
        );

        exit;
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Appointment
    |--------------------------------------------------------------------------
    */

    public function deleteAppointment($id)
    {
        $this->appointmentModel
             ->deleteAppointment($id);

        $_SESSION['success'] =
            "Appointment Deleted Successfully";

        header(
            "Location:index.php?page=manage-appointments"
        );

        exit;
    }

    /*
    |--------------------------------------------------------------------------
    | Reports
    |--------------------------------------------------------------------------
    */

    public function reports()
    {
        include 'view/admin/reports.php';
    }

    /*
    |--------------------------------------------------------------------------
    | Approve Doctor
    |--------------------------------------------------------------------------
    */

    public function approveDoctor($id)
    {
        $this->doctorModel->approveDoctor($id);

        $_SESSION['success'] =
            "Doctor Approved Successfully";

        header("Location:index.php?page=manage-doctors");

        exit;
    }

    /*
    |--------------------------------------------------------------------------
    | Reject Doctor
    |--------------------------------------------------------------------------
    */

    public function rejectDoctor($id)
    {
        $this->adminModel->rejectDoctor($id);

        $_SESSION['success'] =
            "Doctor Rejected Successfully";

        header("Location:index.php?page=manage-doctors");

        exit;
    }

    /*
    |--------------------------------------------------------------------------
    | Approve Patient
    |--------------------------------------------------------------------------
    */

    public function approvePatient($id)
    {
        $this->patientModel->approvePatient($id);

        $_SESSION['success'] =
            "Patient Approved Successfully";

        header("Location:index.php?page=manage-patients");

        exit;
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Patient
    |--------------------------------------------------------------------------
    */

    public function deletePatient($id)
    {
        $this->patientModel->deletePatientByUser($id);

        $_SESSION['success'] =
            "Patient Deleted Successfully";

        header("Location:index.php?page=manage-patients");

        exit;
    }

    /*
    |--------------------------------------------------------------------------
    | AJAX Schedule
    |--------------------------------------------------------------------------
    */

    public function getSchedulesAjax()
    {
        $doctorId = $_POST['doctor_id'];

        $scheduleModel = new ScheduleModel();

        $schedules =
            $scheduleModel->getSchedulesByDoctor($doctorId);

        foreach($schedules as $schedule)
        {
            echo '<option value="'.$schedule['id'].'">';

            echo $schedule['available_date']
                 .' | '
                 .$schedule['start_time']
                 .' - '
                 .$schedule['end_time'];

            echo '</option>';
        }
    }
}