<?php

require_once 'config/database.php';

class UserModel
{
    private $conn;
    private $table = "users";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function createUser($data)
    {
        $query = "INSERT INTO " . $this->table . "
        (
            full_name,
            email,
            phone,
            password,
            role,
            profile_image,
            status
        )
        VALUES
        (
            :full_name,
            :email,
            :phone,
            :password,
            :role,
            :profile_image,
            :status
        )";

        $stmt = $this->conn->prepare($query);

        $password = password_hash($data['password'], PASSWORD_BCRYPT);

        return $stmt->execute([
            ':full_name' => htmlspecialchars(strip_tags($data['full_name'])),
            ':email' => htmlspecialchars(strip_tags($data['email'])),
            ':phone' => htmlspecialchars(strip_tags($data['phone'])),
            ':password' => $password,
            ':role' => htmlspecialchars(strip_tags($data['role'])),
            ':profile_image' => $data['profile_image'] ?? 'default.png',
            ':status' => $data['status']
        ]);
    }

    public function getUserByEmail($email)
    {
        $query = "SELECT * FROM " . $this->table . "
                  WHERE email = :email
                  LIMIT 1";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':email', $email);

        $stmt->execute();

        return $stmt->fetch();
    }

    public function getUserById($id)
    {
        $query = "SELECT * FROM " . $this->table . "
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        return $stmt->fetch();
    }

    public function updateProfile($id, $data)
    {
        $query = "UPDATE " . $this->table . "
                  SET
                    full_name = :full_name,
                    phone = :phone,
                    profile_image = :profile_image
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            ':full_name' => htmlspecialchars(strip_tags($data['full_name'])),
            ':phone' => htmlspecialchars(strip_tags($data['phone'])),
            ':profile_image' => $data['profile_image'],
            ':id' => $id
        ]);
    }

    public function updatePassword($id, $password)
    {
        $query = "UPDATE " . $this->table . "
                  SET password = :password
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        return $stmt->execute([
            ':password' => $hashedPassword,
            ':id' => $id
        ]);
    }

    public function deleteUser($id)
    {
        $query = "DELETE FROM " . $this->table . "
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            ':id' => $id
        ]);
    }

    public function getAllUsers()
    {
        $query = "SELECT * FROM " . $this->table . "
                  ORDER BY id DESC";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}