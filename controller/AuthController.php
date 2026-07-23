<?php

require_once 'model/UserModel.php';
require_once 'model/DoctorModel.php';
require_once 'model/PatientModel.php';

class AuthController
{
    private $userModel;
    private $doctorModel;
    private $patientModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->doctorModel = new DoctorModel();
        $this->patientModel = new PatientModel();
    }

    /*
    |--------------------------------------------------------------------------
    | LOGIN
    |--------------------------------------------------------------------------
    */

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $role = trim($_POST['role']);

            if (empty($email) || empty($password)) {

                $_SESSION['error'] = "All fields required";

                header("Location:index.php?page=login");
                exit;
            }

            $user = $this->userModel
                ->getUserByEmail($email);

            if (!$user) {

                $_SESSION['error'] = "User not found";

                header("Location:index.php?page=login");
                exit;
            }

            if ($user['role'] != $role) {

                $_SESSION['error'] = "Invalid Role";

                header("Location:index.php?page=login");
                exit;
            }

            if (!password_verify($password, $user['password'])) {

                $_SESSION['error'] = "Invalid Password";

                header("Location:index.php?page=login");
                exit;
            }

            if (
                $user['role'] == 'doctor' &&
                $user['status'] == 'pending'
            ) {

                $_SESSION['error'] =
                    "Doctor account pending approval";

                header("Location:index.php?page=login");
                exit;
            }

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['full_name'] = $user['full_name'];

            /*
            |--------------------------------------------------------------------------
            | ROLE REDIRECT
            |--------------------------------------------------------------------------
            */

            if ($role == 'admin') {

                header("Location:index.php?page=admin-dashboard");
                exit;
            }

            if ($role == 'doctor') {

                header("Location:index.php?page=doctor-dashboard");
                exit;
            }

            if ($role == 'patient') {

                header("Location:index.php?page=patient-dashboard");
                exit;
            }
        }

        include 'view/auth/login.php';
    }

    /*
    |--------------------------------------------------------------------------
    | REGISTER
    |--------------------------------------------------------------------------
    */

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $role = $_POST['role'];

            if (
                $_POST['password'] !=
                $_POST['confirm_password']
            ) {

                $_SESSION['error'] =
                    "Password does not match";

                header("Location:index.php?page=register");
                exit;
            }

            $userData = [

                'full_name' =>
                    $_POST['full_name'],

                'email' =>
                    $_POST['email'],

                'phone' =>
                    $_POST['phone'],

                'password' =>
                    $_POST['password'],

                'role' =>
                    $role,

                'status' =>
                    $role == 'doctor'
                    ? 'pending'
                    : 'active'
            ];

            $this->userModel
                ->createUser($userData);

            $user = $this->userModel
                ->getUserByEmail($_POST['email']);

            /*
            |--------------------------------------------------------------------------
            | DOCTOR REGISTER
            |--------------------------------------------------------------------------
            */

            if ($role == 'doctor') {

                $doctorData = [

                    'user_id' =>
                        $user['id'],

                    'specialization' =>
                        $_POST['specialization'],

                    'degree' =>
                        $_POST['degree'],

                    'experience' =>
                        $_POST['experience'],

                    'chamber_address' =>
                        $_POST['chamber_address']
                ];

                $this->doctorModel
                    ->createDoctor($doctorData);
            }

            /*
            |--------------------------------------------------------------------------
            | PATIENT REGISTER
            |--------------------------------------------------------------------------
            */

            if ($role == 'patient') {

                $patientData = [

                    'user_id' =>
                        $user['id'],

                    'gender' =>
                        $_POST['gender'],

                    'age' =>
                        $_POST['age'],

                    'address' =>
                        $_POST['address']
                ];

                $this->patientModel
                    ->createPatient($patientData);
            }

            $_SESSION['success'] =
                "Registration Successful";

            header("Location:index.php?page=login");
            exit;
        }

        include 'view/auth/register.php';
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout()
    {
        session_unset();

        session_destroy();

        header("Location:index.php?page=login");
        exit;
    }

    /*
    |--------------------------------------------------------------------------
    | FORGOT PASSWORD
    |--------------------------------------------------------------------------
    */

    public function forgotPassword()
    {
        include 'view/auth/forgot_password.php';
    }
}