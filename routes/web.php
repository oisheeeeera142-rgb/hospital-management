<?php


require_once 'controller/HomeController.php';
require_once 'controller/AuthController.php';
require_once 'controller/AdminController.php';
require_once 'controller/DoctorController.php';
require_once 'controller/PatientController.php';
require_once 'controller/AppointmentController.php';
require_once 'controller/PrescriptionController.php';
require_once 'controller/ScheduleController.php';

$page = $_GET['page'] ?? 'home';

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/
switch ($page) {

   case 'home':

    $controller = new HomeController();
    $controller->index();

break;

    /*
    |--------------------------------------------------------------------------
    | AUTH
    |--------------------------------------------------------------------------
    */

    case 'login':
        $controller = new AuthController();
        $controller->login();
    break;

    case 'register':
        $controller = new AuthController();
        $controller->register();
    break;

    case 'forgot-password':
        $controller = new AuthController();
        $controller->forgotPassword();
    break;

    case 'logout':
        $controller = new AuthController();
        $controller->logout();
    break;

    /*
    |--------------------------------------------------------------------------
    | ADMIN ROUTES
    |--------------------------------------------------------------------------
    */

    case 'admin-dashboard':

    if (
        !isset($_SESSION['role']) ||
        trim($_SESSION['role']) != 'admin'
    ) {

        header("Location:index.php?page=login");
        exit;
    }

    $controller = new AdminController();
    $controller->dashboard();

break;

    case 'manage-doctors':

        if (
            !isset($_SESSION['role']) ||
            $_SESSION['role'] !== 'admin'
        ) {
            die("Access Denied");
        }

        $controller = new AdminController();
        $controller->manageDoctors();

    break;

    case 'manage-patients':

        if (
            !isset($_SESSION['role']) ||
            $_SESSION['role'] !== 'admin'
        ) {
            die("Access Denied");
        }

        $controller = new AdminController();
        $controller->managePatients();

    break;

    case 'manage-appointments':

        if (
            !isset($_SESSION['role']) ||
            $_SESSION['role'] !== 'admin'
        ) {
            die("Access Denied");
        }

        $controller = new AdminController();
        $controller->manageAppointments();

    break;

    case 'reports':

        if (
            !isset($_SESSION['role']) ||
            $_SESSION['role'] !== 'admin'
        ) {
            die("Access Denied");
        }

        $controller = new AdminController();
        $controller->reports();

    break;

    case 'approve-doctor':

        if (
            !isset($_SESSION['role']) ||
            $_SESSION['role'] !== 'admin'
        ) {
            die("Access Denied");
        }

        $controller = new AdminController();
        $controller->approveDoctor($_GET['id']);
    break;

    case 'reject-doctor':

        if (
            !isset($_SESSION['role']) ||
            $_SESSION['role'] !== 'admin'
        ) {
            die("Access Denied");
        }

        $controller = new AdminController();
        $controller->rejectDoctor($_GET['id']);
    break;

    case 'approve-patient':

        if (
            !isset($_SESSION['role']) ||
            $_SESSION['role'] !== 'admin'
        ) {
            die("Access Denied");
        }

        $controller = new AdminController();
        $controller->approvePatient($_GET['id']);
    break;

    case 'delete-patient':

        if (
            !isset($_SESSION['role']) ||
            $_SESSION['role'] !== 'admin'
        ) {
            die("Access Denied");
        }

        $controller = new AdminController();
        $controller->deletePatient($_GET['id']);
    break;

    case 'approve-appointment-admin':

        if (
            !isset($_SESSION['role']) ||
            $_SESSION['role'] !== 'admin'
        ) {
            die("Access Denied");
        }

        $controller = new AdminController();
        $controller->approveAppointment($_GET['id']);
    break;

    case 'delete-appointment':

        if (
            !isset($_SESSION['role']) ||
            $_SESSION['role'] !== 'admin'
        ) {
            die("Access Denied");
        }

        $controller = new AdminController();
        $controller->deleteAppointment($_GET['id']);
    break;

    /*
    |--------------------------------------------------------------------------
    | DOCTOR ROUTES
    |--------------------------------------------------------------------------
    */
     case 'doctors':

    $controller = new HomeController();
    $controller->doctors();

break;
    case 'doctor-dashboard':

        if (
            !isset($_SESSION['role']) ||
            $_SESSION['role'] !== 'doctor'
        ) {
            header("Location:index.php?page=login");
            exit;
        }

        $controller = new DoctorController();
        $controller->dashboard();

    break;

    case 'doctor-appointments':

        if (
            !isset($_SESSION['role']) ||
            $_SESSION['role'] !== 'doctor'
        ) {
            die("Access Denied");
        }

        $controller = new DoctorController();
        $controller->appointments();

    break;

    case 'manage-schedule':

        if (
            !isset($_SESSION['role']) ||
            $_SESSION['role'] !== 'doctor'
        ) {
            die("Access Denied");
        }

        $controller = new DoctorController();
        $controller->manageSchedule();

    break;

    case 'doctor-profile':

        if (
            !isset($_SESSION['role']) ||
            $_SESSION['role'] !== 'doctor'
        ) {
            die("Access Denied");
        }

        $controller = new DoctorController();
        $controller->profile();

    break;

    /*
    |--------------------------------------------------------------------------
    | PATIENT ROUTES
    |--------------------------------------------------------------------------
    */

    case 'patient-dashboard':

        if (
            !isset($_SESSION['role']) ||
            $_SESSION['role'] !== 'patient'
        ) {
            header("Location:index.php?page=login");
            exit;
        }

        $controller = new PatientController();
        $controller->dashboard();

    break;

    case 'book-appointment':

        if (
            !isset($_SESSION['role']) ||
            $_SESSION['role'] !== 'patient'
        ) {
            die("Access Denied");
        }

        $controller = new AppointmentController();
        $controller->bookAppointment();

    break;

    case 'appointment-history':

        if (
            !isset($_SESSION['role']) ||
            $_SESSION['role'] !== 'patient'
        ) {
            die("Access Denied");
        }

        $controller = new PatientController();
        $controller->appointmentHistory();

    break;

    case 'patient-prescriptions':

        if (
            !isset($_SESSION['role']) ||
            $_SESSION['role'] !== 'patient'
        ) {
            die("Access Denied");
        }

        $controller = new PatientController();
        $controller->prescriptions();

    break;

    case 'patient-profile':

        if (
            !isset($_SESSION['role']) ||
            $_SESSION['role'] !== 'patient'
        ) {
            die("Access Denied");
        }

        $controller = new PatientController();
        $controller->profile();

    break;

    /*
    |--------------------------------------------------------------------------
    | APPOINTMENTS AJAX
    |--------------------------------------------------------------------------
    */

    case 'cancel-appointment':
        $controller = new AppointmentController();
        $controller->cancelAppointment($_GET['id']);
    break;

    case 'approve-appointment':
        $controller = new DoctorController();
        $controller->approveAppointment($_GET['id']);
    break;

    case 'reject-appointment':
        $controller = new DoctorController();
        $controller->rejectAppointment($_GET['id']);
    break;

    case 'get-schedules':
        $controller = new AppointmentController();
        $controller->getSchedulesAjax();
    break;

    /*
    |--------------------------------------------------------------------------
    | PRESCRIPTIONS
    |--------------------------------------------------------------------------
    */

    case 'create-prescription':
        $controller = new PrescriptionController();
        $controller->createPrescription();
    break;

    case 'view-prescriptions':
        $controller = new PrescriptionController();
        $controller->viewPrescriptions();
    break;

    /*
    |--------------------------------------------------------------------------
    | DEFAULT
    |--------------------------------------------------------------------------
    */

   default:

    $controller = new HomeController();
    $controller->index();

break;
}