<?php

require_once 'model/DoctorModel.php';
require_once 'model/AppointmentModel.php';
require_once 'model/ScheduleModel.php';

class DoctorController
{
    private $doctorModel;
    private $appointmentModel;
    private $scheduleModel;

    public function __construct()
    {
        $this->doctorModel = new DoctorModel();
        $this->appointmentModel = new AppointmentModel();
        $this->scheduleModel = new ScheduleModel();
    }

    public function dashboard()
    {
        $appointments = $this->appointmentModel
            ->getAllAppointments();

        include 'view/doctor/dashboard.php';
    }

    public function appointments()
    {
        $appointments = $this->appointmentModel
            ->getAllAppointments();

        include 'view/doctor/appointments.php';
    }

  public function manageSchedule()
{
    $scheduleModel = new ScheduleModel();
    $doctorModel = new DoctorModel();

    $doctor =
        $doctorModel->getDoctorByUserId(
            $_SESSION['user_id']
        );

    if(!$doctor){
        die("Doctor not found");
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $data = [

            'doctor_id' =>
                $doctor['id'],

            'available_date' =>
                $_POST['available_date'],

            'start_time' =>
                $_POST['start_time'],

            'end_time' =>
                $_POST['end_time']
        ];

        $scheduleModel->createSchedule($data);

        $_SESSION['success'] =
            "Schedule Added Successfully";

        header(
            "Location:index.php?page=manage-schedule"
        );

        exit;
    }

    $schedules =
        $scheduleModel->getSchedulesByDoctor(
            $doctor['id']
        );

    include 'view/doctor/manage_schedule.php';
}

    public function approveAppointment($id)
    {
        $this->appointmentModel
            ->updateAppointmentStatus($id, 'approved');

        $_SESSION['success'] = "Appointment Approved";

        header("Location:index.php?page=doctor-appointments");
    }

    public function rejectAppointment($id)
    {
        $this->appointmentModel
            ->updateAppointmentStatus($id, 'rejected');

        $_SESSION['success'] = "Appointment Rejected";

        header("Location:index.php?page=doctor-appointments");
    }

    public function profile()
    {
        include 'view/doctor/profile.php';
    }
}