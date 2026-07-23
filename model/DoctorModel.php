<?php

require_once 'config/database.php';

class DoctorModel
{
    private $conn;
    private $table = "doctors";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function createDoctor($data)
    {
        $query = "INSERT INTO " . $this->table . "
        (
            user_id,
            specialization,
            degree,
            experience,
            chamber_address
        )
        VALUES
        (
            :user_id,
            :specialization,
            :degree,
            :experience,
            :chamber_address
        )";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            ':user_id' => $data['user_id'],
            ':specialization' => htmlspecialchars(strip_tags($data['specialization'])),
            ':degree' => htmlspecialchars(strip_tags($data['degree'])),
            ':experience' => $data['experience'],
            ':chamber_address' => htmlspecialchars(strip_tags($data['chamber_address']))
        ]);
    }
public function getAllDoctors()
{
    $query = "SELECT

                doctors.*,
                users.full_name,
                users.email,
                users.phone,
                users.status

              FROM doctors

              INNER JOIN users
              ON doctors.user_id = users.id

              WHERE users.status = 'active'

              ORDER BY doctors.id DESC";

    $stmt = $this->conn->prepare($query);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    public function getDoctorById($id)
    {
        $query = "SELECT doctors.*, users.*
                  FROM doctors
                  INNER JOIN users
                  ON doctors.user_id = users.id
                  WHERE doctors.id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        return $stmt->fetch();
    }

    public function updateDoctor($id, $data)
    {
        $query = "UPDATE " . $this->table . "
                  SET
                    specialization = :specialization,
                    degree = :degree,
                    experience = :experience,
                    chamber_address = :chamber_address
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            ':specialization' => $data['specialization'],
            ':degree' => $data['degree'],
            ':experience' => $data['experience'],
            ':chamber_address' => $data['chamber_address'],
            ':id' => $id
        ]);
    }
public function index()
{
    $doctorModel = new DoctorModel();


    $doctors = $doctorModel->getAllDoctors();

    include 'view/home/index.php';
}
   public function approveDoctor($userId)
{
    $query = "UPDATE users
              SET status='active'
              WHERE id=:id";

    $stmt = $this->conn->prepare($query);

    return $stmt->execute([
        ':id' => $userId
    ]);
}

    public function searchDoctor($keyword)
    {
        $query = "SELECT doctors.*, users.*
                  FROM doctors
                  INNER JOIN users
                  ON doctors.user_id = users.id
                  WHERE users.full_name LIKE :keyword
                  OR doctors.specialization LIKE :keyword";

        $stmt = $this->conn->prepare($query);

        $search = "%{$keyword}%";

        $stmt->bindParam(':keyword', $search);

        $stmt->execute();

        return $stmt->fetchAll();
    }
public function getDoctorByUserId($userId)
{
    $query = "SELECT *
              FROM doctors
              WHERE user_id = :user_id";

    $stmt = $this->conn->prepare($query);

    $stmt->execute([
        ':user_id' => $userId
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}


}