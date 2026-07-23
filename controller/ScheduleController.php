<?php

require_once 'model/ScheduleModel.php';

class ScheduleController
{
    private $scheduleModel;

    public function __construct()
    {
        $this->scheduleModel = new ScheduleModel();
    }

    public function createSchedule()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Basic Validation
            if (
                empty($_POST['doctor_id']) ||
                empty($_POST['available_date']) ||
                empty($_POST['start_time']) ||
                empty($_POST['end_time'])
            ) {

                $_SESSION['error'] = "All fields are required.";
                header("Location:index.php?page=manage-schedule");
                exit;
            }

            $scheduleData = [
                'doctor_id'      => $_POST['doctor_id'],
                'available_date' => $_POST['available_date'],
                'start_time'     => $_POST['start_time'],
                'end_time'       => $_POST['end_time']
            ];

            $this->scheduleModel->createSchedule($scheduleData);

            $_SESSION['success'] = "Schedule Created Successfully";

            header("Location:index.php?page=manage-schedule");
            exit;
        }
    }

    public function deleteSchedule($id)
    {
        $this->scheduleModel->deleteSchedule($id);

        $_SESSION['success'] = "Schedule Deleted";

        header("Location:index.php?page=manage-schedule");
        exit;
    }
}