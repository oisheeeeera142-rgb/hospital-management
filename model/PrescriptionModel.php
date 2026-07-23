<?php

require_once 'config/database.php';

class PrescriptionModel
{
    private $conn;
    private $table = "prescriptions";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // CREATE

    public function createPrescription($data)
    {
        $query = "INSERT INTO prescriptions
        (
            appointment_id,
            medicines,
            dosage,
            duration,
            tests,
            notes
        )
        VALUES
        (
            :appointment_id,
            :medicines,
            :dosage,
            :duration,
            :tests,
            :notes
        )";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([

            ':appointment_id' =>
                $data['appointment_id'],

            ':medicines' =>
                $data['medicines'],

            ':dosage' =>
                $data['dosage'],

            ':duration' =>
                $data['duration'],

            ':tests' =>
                $data['tests'],

            ':notes' =>
                $data['notes']
        ]);
    }

    // GET PATIENT PRESCRIPTIONS

    public function getPatientPrescriptions($patientId)
    {
        $query = "SELECT

                    prescriptions.*,
                    appointments.appointment_date,
                    users.full_name AS doctor_name

                  FROM prescriptions

                  INNER JOIN appointments
                  ON prescriptions.appointment_id = appointments.id

                  INNER JOIN doctors
                  ON appointments.doctor_id = doctors.id

                  INNER JOIN users
                  ON doctors.user_id = users.id

                  WHERE appointments.patient_id = :patient_id

                  ORDER BY prescriptions.id DESC";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(
            ':patient_id',
            $patientId
        );

        $stmt->execute();

        return $stmt->fetchAll();
    }
    public function getAllPrescriptions()
{
    $query = "SELECT
                prescriptions.*,
                appointments.appointment_date,
                users.full_name AS doctor_name

              FROM prescriptions

              LEFT JOIN appointments
              ON prescriptions.appointment_id = appointments.id

              LEFT JOIN doctors
              ON appointments.doctor_id = doctors.id

              LEFT JOIN users
              ON doctors.user_id = users.id

              ORDER BY prescriptions.id DESC";

    $stmt = $this->conn->prepare($query);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}