<?php

require_once 'config/database.php';

class ScheduleModel
{
    private $conn;
    private $table = "schedules";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE SCHEDULE
    |--------------------------------------------------------------------------
    */

    public function createSchedule($data)
    {
        $query = "INSERT INTO schedules
        (
            doctor_id,
            available_date,
            start_time,
            end_time
        )
        VALUES
        (
            :doctor_id,
            :available_date,
            :start_time,
            :end_time
        )";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([

            ':doctor_id'=>$data['doctor_id'],

            ':available_date'=>$data['available_date'],

            ':start_time'=>$data['start_time'],

            ':end_time'=>$data['end_time']

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | GET SCHEDULES OF A DOCTOR
    |--------------------------------------------------------------------------
    */

    public function getSchedulesByDoctor($doctorId)
    {
        $query = "SELECT *

                  FROM schedules

                  WHERE doctor_id=:doctor_id

                  ORDER BY

                  available_date ASC,

                  start_time ASC";

        $stmt = $this->conn->prepare($query);

        $stmt->execute([

            ':doctor_id'=>$doctorId

        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /*
    |--------------------------------------------------------------------------
    | GET SINGLE SCHEDULE
    |--------------------------------------------------------------------------
    */

    public function getScheduleById($id)
    {
        $query = "SELECT *

                  FROM schedules

                  WHERE id=:id";

        $stmt=$this->conn->prepare($query);

        $stmt->execute([

            ':id'=>$id

        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /*
    |--------------------------------------------------------------------------
    | CHECK SCHEDULE
    |--------------------------------------------------------------------------
    */

    public function hasSchedule($doctorId)
    {
        $query="SELECT COUNT(*) total

                FROM schedules

                WHERE doctor_id=:doctor_id";

        $stmt=$this->conn->prepare($query);

        $stmt->execute([

            ':doctor_id'=>$doctorId

        ]);

        $row=$stmt->fetch(PDO::FETCH_ASSOC);

        return $row['total']>0;
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function deleteSchedule($id)
    {
        $query="DELETE FROM schedules

                WHERE id=:id";

        $stmt=$this->conn->prepare($query);

        return $stmt->execute([

            ':id'=>$id

        ]);
    }

}