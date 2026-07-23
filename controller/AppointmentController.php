<?php

require_once 'model/AppointmentModel.php';
require_once 'model/DoctorModel.php';
require_once 'model/ScheduleModel.php';
require_once 'model/PatientModel.php';

class AppointmentController
{
    private $appointmentModel;
    private $doctorModel;
    private $scheduleModel;

    public function __construct()
    {
        $this->appointmentModel = new AppointmentModel();
        $this->doctorModel = new DoctorModel();
        $this->scheduleModel = new ScheduleModel();
    }

    /*
    |--------------------------------------------------------------------------
    | Book Appointment
    |--------------------------------------------------------------------------
    */

    public function bookAppointment()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            if (!isset($_SESSION['user_id']))
            {
                header("Location:index.php?page=login");
                exit;
            }

            $patientModel = new PatientModel();

            $patient = $patientModel->getPatientByUserId($_SESSION['user_id']);

            if (!$patient)
            {
                die("Patient record not found.");
            }

            if (
                empty($_POST['doctor_id']) ||
                empty($_POST['schedule_id']) ||
                empty($_POST['appointment_date']) ||
                empty($_POST['appointment_time'])
            )
            {
                $_SESSION['error'] = "Please fill all required fields.";

                header("Location:index.php?page=book-appointment");
                exit;
            }

            /*
            |--------------------------------------------------------------------------
            | GET SELECTED SCHEDULE
            |--------------------------------------------------------------------------
            */

            $schedule = $this->scheduleModel->getScheduleById($_POST['schedule_id']);

            if (!$schedule)
            {
                $_SESSION['error'] = "Invalid Schedule.";

                header("Location:index.php?page=book-appointment");
                exit;
            }

            /*
            |--------------------------------------------------------------------------
            | DOCTOR VALIDATION
            |--------------------------------------------------------------------------
            */

            if ($schedule['doctor_id'] != $_POST['doctor_id'])
            {
                $_SESSION['error'] = "Selected schedule does not belong to this doctor.";

                header("Location:index.php?page=book-appointment");
                exit;
            }

            /*
            |--------------------------------------------------------------------------
            | DATE VALIDATION
            |--------------------------------------------------------------------------
            */

            if ($_POST['appointment_date'] != $schedule['available_date'])
            {
                $_SESSION['error'] = "Appointment date must match selected schedule.";

                header("Location:index.php?page=book-appointment");
                exit;
            }

            /*
            |--------------------------------------------------------------------------
            | TIME VALIDATION
            |--------------------------------------------------------------------------
            */

            if (
                $_POST['appointment_time'] < $schedule['start_time'] ||
                $_POST['appointment_time'] > $schedule['end_time']
            )
            {
                $_SESSION['error'] = "Appointment time must be within doctor's schedule.";

                header("Location:index.php?page=book-appointment");
                exit;
            }

            /*
            |--------------------------------------------------------------------------
            | SAVE DATA
            |--------------------------------------------------------------------------
            */

            $data = [

                'patient_id' => $patient['id'],

                'doctor_id' => $_POST['doctor_id'],

                'schedule_id' => $_POST['schedule_id'],

                'appointment_date' => $_POST['appointment_date'],

                'appointment_time' => $_POST['appointment_time'],

                'notes' => $_POST['notes'] ?? ''
            ];

            $result = $this->appointmentModel->createAppointment($data);

            if ($result)
            {
                $_SESSION['success'] = "Appointment booked successfully.";

                header("Location:index.php?page=appointment-history");
                exit;
            }
            else
            {
                $_SESSION['error'] = "Appointment booking failed.";

                header("Location:index.php?page=book-appointment");
                exit;
            }
        }

        $doctors = $this->doctorModel->getAllDoctors();

        include 'view/patient/book_appointment.php';
    }

    /*
    |--------------------------------------------------------------------------
    | AJAX : Get Doctor Schedule
    |--------------------------------------------------------------------------
    */

    public function getSchedulesAjax()
    {
        header('Content-Type: application/json');

        if (!isset($_GET['doctor_id']))
        {
            echo json_encode([]);
            exit;
        }

        $doctorId = $_GET['doctor_id'];

        $schedules = $this->scheduleModel->getSchedulesByDoctor($doctorId);

        echo json_encode($schedules);

        exit;
    }
}