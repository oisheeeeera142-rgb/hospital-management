<?php

require_once 'config/database.php';

class PatientModel
{
    private $conn;
    private $table = "patients";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE PATIENT
    |--------------------------------------------------------------------------
    */

    public function createPatient($data)
    {
        $query = "INSERT INTO patients
        (
            user_id,
            gender,
            age,
            address
        )
        VALUES
        (
            :user_id,
            :gender,
            :age,
            :address
        )";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([

            ':user_id' => $data['user_id'],

            ':gender' => $data['gender'],

            ':age' => $data['age'],

            ':address' => $data['address']
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | GET PATIENT BY ID
    |--------------------------------------------------------------------------
    */

    public function getPatientById($id)
    {
        $query = "SELECT patients.*, users.*
                  FROM patients
                  INNER JOIN users
                  ON patients.user_id = users.id
                  WHERE patients.id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /*
    |--------------------------------------------------------------------------
    | GET PATIENT BY USER ID
    |--------------------------------------------------------------------------
    */

    public function getPatientByUserId($userId)
    {
        $query = "SELECT *
                  FROM patients
                  WHERE user_id = :user_id
                  LIMIT 1";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(
            ':user_id',
            $userId
        );

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /*
    |--------------------------------------------------------------------------
    | GET ALL PATIENTS
    |--------------------------------------------------------------------------
    */

    public function getAllPatients()
    {
        $query = "SELECT patients.*, users.*
                  FROM patients
                  INNER JOIN users
                  ON patients.user_id = users.id
                  ORDER BY patients.id DESC";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE PATIENT
    |--------------------------------------------------------------------------
    */

    public function updatePatient($id, $data)
    {
        $query = "UPDATE patients
                  SET
                    gender = :gender,
                    age = :age,
                    address = :address
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([

            ':gender' => $data['gender'],

            ':age' => $data['age'],

            ':address' => $data['address'],

            ':id' => $id
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE PATIENT
    |--------------------------------------------------------------------------
    */

    public function deletePatient($id)
    {
        $query = "DELETE FROM patients
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([

            ':id' => $id
        ]);
    }


public function approvePatient($userId)
{
    $query = "UPDATE users
              SET status='active'
              WHERE id=:id";

    $stmt = $this->conn->prepare($query);

    return $stmt->execute([
        ':id' => $userId
    ]);
}

public function deletePatientByUser($userId)
{
    $query = "DELETE FROM users
              WHERE id=:id";

    $stmt = $this->conn->prepare($query);

    return $stmt->execute([
        ':id' => $userId
    ]);
}
}