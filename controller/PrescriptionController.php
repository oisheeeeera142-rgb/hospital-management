<?php

require_once 'model/PrescriptionModel.php';
require_once 'model/AppointmentModel.php';

class PrescriptionController
{
    private $prescriptionModel;
    private $appointmentModel;

    public function __construct()
    {
        $this->prescriptionModel =
            new PrescriptionModel();

        $this->appointmentModel =
            new AppointmentModel();
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE PRESCRIPTION
    |--------------------------------------------------------------------------
    */

    public function createPrescription()
    {
        // Doctor Login Check

        if (
            !isset($_SESSION['role']) ||
            $_SESSION['role'] != 'doctor'
        ) {

            header("Location:index.php?page=login");
            exit;
        }

        // Form Submit

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Validation

            if (
                empty($_POST['appointment_id']) ||
                empty($_POST['medicines']) ||
                empty($_POST['dosage'])
            ) {

                $_SESSION['error'] =
                    "All Required Fields Must Be Filled";

                header(
                    "Location:index.php?page=doctor-appointments"
                );

                exit;
            }

            // Data Array

            $data = [

                'appointment_id' =>
                    $_POST['appointment_id'],

                'medicines' =>
                    htmlspecialchars(
                        trim($_POST['medicines'])
                    ),

                'dosage' =>
                    htmlspecialchars(
                        trim($_POST['dosage'])
                    ),

                'duration' =>
                    htmlspecialchars(
                        trim($_POST['duration'])
                    ),

                'tests' =>
                    htmlspecialchars(
                        trim($_POST['tests'])
                    ),

                'notes' =>
                    htmlspecialchars(
                        trim($_POST['notes'])
                    )
            ];

            // Insert Prescription

            $this->prescriptionModel
                 ->createPrescription($data);

            $_SESSION['success'] =
                "Prescription Added Successfully";

            header(
                "Location:index.php?page=doctor-appointments"
            );

            exit;
        }

        // Appointment ID Check

        if (!isset($_GET['appointment_id'])) {

            $_SESSION['error'] =
                "Appointment Not Found";

            header(
                "Location:index.php?page=doctor-appointments"
            );

            exit;
        }

        // Get Appointment

        $appointmentId =
            $_GET['appointment_id'];

        $appointment =
            $this->appointmentModel
                 ->getAppointmentById(
                     $appointmentId
                 );

        include
        'view/doctor/prescriptions.php';
    }

    /*
    |--------------------------------------------------------------------------
    | VIEW PRESCRIPTIONS FOR PATIENT
    |--------------------------------------------------------------------------
    */

    public function viewPrescriptions()
    {
        // Patient Login Check

        if (
            !isset($_SESSION['role']) ||
            $_SESSION['role'] != 'patient'
        ) {

            header("Location:index.php?page=login");
            exit;
        }

        // Get Logged In Patient

        $patientId =
            $_SESSION['patient_id'] ?? 0;

        // Get Prescription List

        $prescriptions =
            $this->prescriptionModel
                 ->getPatientPrescriptions(
                     $patientId
                 );

        include
        'view/patient/prescriptions.php';
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE PRESCRIPTION
    |--------------------------------------------------------------------------
    */

    public function deletePrescription($id)
    {
        // Admin/Doctor Check

        if (
            !isset($_SESSION['role'])
        ) {

            header("Location:index.php?page=login");
            exit;
        }

        $this->prescriptionModel
             ->deletePrescription($id);

        $_SESSION['success'] =
            "Prescription Deleted Successfully";

        header(
            "Location:index.php?page=doctor-appointments"
        );

        exit;
    }
}