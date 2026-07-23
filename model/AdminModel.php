<?php

require_once 'config/database.php';

class AdminModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // admin methods here...

    /*
    |--------------------------------------------------------------------------
    | CREATE APPOINTMENT
    |--------------------------------------------------------------------------
    */

    public function createAppointment($data)
    {
        $query = "INSERT INTO appointments
        (
            patient_id,
            doctor_id,
            schedule_id,
            appointment_date,
            appointment_time,
            notes
        )
        VALUES
        (
            :patient_id,
            :doctor_id,
            :schedule_id,
            :appointment_date,
            :appointment_time,
            :notes
        )";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([

            ':patient_id' =>
                $data['patient_id'],

            ':doctor_id' =>
                $data['doctor_id'],

            ':schedule_id' =>
                $data['schedule_id'],

            ':appointment_date' =>
                $data['appointment_date'],

            ':appointment_time' =>
                $data['appointment_time'],

            ':notes' =>
                $data['notes']
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | GET ALL APPOINTMENTS
    |--------------------------------------------------------------------------
    */

    public function getAllAppointments()
    {
        $query = "SELECT
                    appointments.*,

                    users.full_name AS patient_name,

                    doctors.specialization,

                    doctor_users.full_name AS doctor_name

                  FROM appointments

                  INNER JOIN patients
                  ON appointments.patient_id = patients.id

                  INNER JOIN users
                  ON patients.user_id = users.id

                  INNER JOIN doctors
                  ON appointments.doctor_id = doctors.id

                  INNER JOIN users AS doctor_users
                  ON doctors.user_id = doctor_users.id

                  ORDER BY appointments.id DESC";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE STATUS
    |--------------------------------------------------------------------------
    */

    public function updateStatus($id, $status)
    {
        $query = "UPDATE appointments
                  SET status = :status
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([

            ':status' => $status,

            ':id' => $id
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE APPOINTMENT
    |--------------------------------------------------------------------------
    */

    public function deleteAppointment($id)
    {
        $query = "DELETE FROM appointments
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([

            ':id' => $id
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | GET APPOINTMENT BY PATIENT
    |--------------------------------------------------------------------------
    */

    public function getAppointmentsByPatient($patientId)
    {
        $query = "SELECT *
                  FROM appointments
                  WHERE patient_id = :patient_id
                  ORDER BY id DESC";

        $stmt = $this->conn->prepare($query);

        $stmt->execute([

            ':patient_id' => $patientId
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /*
    |--------------------------------------------------------------------------
    | GET APPOINTMENT BY DOCTOR
    |--------------------------------------------------------------------------
    */

    public function getAppointmentsByDoctor($doctorId)
    {
        $query = "SELECT *
                  FROM appointments
                  WHERE doctor_id = :doctor_id
                  ORDER BY id DESC";

        $stmt = $this->conn->prepare($query);

        $stmt->execute([

            ':doctor_id' => $doctorId
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getScheduleById($id)
{
    $query = "SELECT *
              FROM schedules
              WHERE id = :id";

    $stmt = $this->conn->prepare($query);

    $stmt->execute([
        ':id' => $id
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
}
