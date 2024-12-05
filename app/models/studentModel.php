<?php

/** 
 * Student Account Status
 * 1 = Approved
 * 2 = Pending
 * 3 = Cancelled
 */

class studentModel extends model
{
    private $con;
    private $SUCCESS_RESPONSE = '1';
    private $FAILED_RESPONSE = '0';
    private $STATUS_APPROVED = '1';
    private $STATUS_PENDING = '2';
    private $STATUS_CANCELLED = '3';

    public function __construct()
    {
        $db = new database();
        $this->con = $db->connection();
    }

    public function authentication($param = array())
    {
        $identification = $param['identification'];
        $password = $param['password'];
        $data = array();

        $sql = "SELECT * FROM tbl_student WHERE studentId = '" . $identification . "'";
        $result = $this->con->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            switch ($row['account_status_id']) {
                case $this->STATUS_APPROVED:
                    if (!password_verify($password, $row['password'])) {
                        $data = array(
                            'response' => $this->FAILED_RESPONSE,
                            'message' => "Login failed, Please check your username and password."
                        );
                        return $data;
                    }

                    $data = array(
                        'response' => $this->SUCCESS_RESPONSE,
                        'message' => "Login success.",
                        'data' => $row
                    );
                    break;

                case $this->STATUS_PENDING:
                    $data = array(
                        'response' => $this->FAILED_RESPONSE,
                        'message' => "Login failed, Your account is still waiting for administrator approval."
                    );
                    return $data;
                    break;

                case $this->STATUS_CANCELLED:
                    $data = array(
                        'response' => $this->FAILED_RESPONSE,
                        'message' => "Login failed, Your account has been canceled by the administrator. Administrator's note: " . $row['cancel_message']
                    );
                    return $data;
                    break;

                default:
                    $data = array(
                        'response' => $this->FAILED_RESPONSE,
                        'message' => "Login failed, There seems to be an error in the system. Please contact the administrator."
                    );
                    return $data;
                    break;
            }
        } else {
            $data = array(
                'response' => $this->FAILED_RESPONSE,
                'message' => "Login failed, Please check your username and password."
            );
        }

        $this->con->close();
        return $data;
    }

    public function approvedStudents() {
        $data = array();

        $sql = "SELECT * FROM view_approved_students";
        $result = $this->con->query($sql);
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        $this->con->close();
        return $data;
    }

    public function pendingStudents() {
        $data = array();

        $sql = "SELECT * FROM view_pending_students";
        $result = $this->con->query($sql);
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        $this->con->close();
        return $data;
    }

    public function cancelledStudents() {
        $data = array();

        $sql = "SELECT * FROM view_cancelled_students";
        $result = $this->con->query($sql);
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        $this->con->close();
        return $data;
    }

    public function store($param = array()) 
    {
        $lastname = $param['lastname'];
        $firstname = $param['firstname'];
        $middlename = $param['middlename'];
        $program = $param['program'];
        $year_level = $param['year_level'];
        $status = $param['status'];
        $student_identification = $param['student_identification'];
        $password = password_hash($param['password'], PASSWORD_DEFAULT);
        $account_status_id = $this->STATUS_PENDING;
        $created_at = date('Y-m-d H:i:s'); 
        $data = array();

        $sql = "SELECT studentId FROM tbl_student WHERE studentId = '".$student_identification."'";
        $result = $this->con->query($sql);
        if($result->num_rows > 0)
        {
            $data = array(
                'response' => $this->FAILED_RESPONSE,
                'message' => "Failed, This identification is already registered."
            );

            return $data;
        }

        $sql = "INSERT INTO `tbl_student`(`lastname`, `firstname`, `middlename`, `program_id`, `year_level_id`, `student_status_id`, `studentId`, `password`, `account_status_id`, `created_at`) VALUES ('" . $lastname . "','" . $firstname . "','" . $middlename . "','" . $program . "','" . $year_level . "','" . $status . "','" . $student_identification . "','" . $password . "','" . $account_status_id . "','" . $created_at . "')";

        if($this->con->query($sql) === TRUE)
        {
            $data = array(
                'response' => $this->SUCCESS_RESPONSE,
                'message' => "Success, You have successfully registered."
            );
        }
        else
        {
            $data = array(
                'response' => $this->FAILED_RESPONSE,
                'message' => "Failed, "  . $sql . "<br>" . $this->con->error
            );
        }

        $this->con->close();
        return $data;
    }

	public function edit($param = array())
	{
        $id = $param['id'];
        $data = array();

        $sql = "SELECT * FROM tbl_student WHERE id = '".$id."'";
        $result = $this->con->query($sql);
        if($result->num_rows > 0)
        {
            $data = $result->fetch_assoc();
        }

        $this->con->close();
        return $data;
	}

	public function update($param = array())
	{
        $id = $param['id'];
        $old_password = $param['old_password'];
        $old_student_identification = $param['old_student_identification'];
        $lastname = $param['lastname'];
        $firstname = $param['firstname'];
        $middlename = $param['middlename'];
        $program = $param['program'];
        $year_level = $param['year_level'];
        $status = $param['status'];
        $student_identification = $param['student_identification'];
        $password = $old_password === $param['password'] ? $old_password : ($param['password'] != null ? password_hash($param['password'], PASSWORD_DEFAULT) : $old_password);
        $data = array();

        if ($old_student_identification != $student_identification) {
            $sql = "SELECT studentId FROM tbl_student WHERE studentId = '".$student_identification."'";
            $result = $this->con->query($sql);
            if($result->num_rows > 0)
            {
                $data = array(
                    'response' => $this->FAILED_RESPONSE,
                    'message' => "Failed, This identification is already registered."
                );

                return $data;
            }
        }

        $sql = "UPDATE `tbl_student` SET `lastname`='".$lastname."',`firstname`='".$firstname."',`middlename`='".$middlename."',`program_id`='".$program."',`year_level_id`='".$year_level."',`student_status_id`='".$status."',`studentId`='".$student_identification."',`password`='".$password."' WHERE id = '".$id."'";

        if($this->con->query($sql) === TRUE)
        {
            $data = array(
                'response' => $this->SUCCESS_RESPONSE,
                'message' => "Success, Your account has been successfully updated."
            );
        }
        else
        {
            $data = array(
                'response' => $this->FAILED_RESPONSE,
                'message' => "Failed, "  . $sql . "<br>" . $this->con->error
            );
        }

        $this->con->close();
        return $data;
	}

	public function updateStatusToApproved($param = array())
	{
        $id = $param['id'];
        $data = array();

        $sql = "UPDATE `tbl_student` SET `account_status_id`='".$this->STATUS_APPROVED."' WHERE id = ".$id."";

        if($this->con->query($sql) === TRUE)
        {
            $data = array(
                'response' => $this->SUCCESS_RESPONSE,
                'message' => "Success, You have successfully update the status of this account."
            );
        }
        else
        {
            $data = array(
                'response' => $this->FAILED_RESPONSE,
                'message' => "Failed, "  . $sql . "<br>" . $this->con->error
            );
        }

        $this->con->close();
        return $data;

	}

	public function updateStatusToPending($param = array())
	{
        $id = $param['id'];
        $data = array();

        $sql = "UPDATE `tbl_student` SET `account_status_id`='".$this->STATUS_PENDING."' WHERE id = ".$id."";

        if($this->con->query($sql) === TRUE)
        {
            $data = array(
                'response' => $this->SUCCESS_RESPONSE,
                'message' => "Success, You have successfully update the status of this account."
            );
        }
        else
        {
            $data = array(
                'response' => $this->FAILED_RESPONSE,
                'message' => "Failed, "  . $sql . "<br>" . $this->con->error
            );
        }

        $this->con->close();
        return $data;

	}

	public function updateStatusToCancelled($param = array())
	{
        $id = $param['id'];
        $cancel_message = $param['reason'];
        $data = array();

        $sql = "UPDATE `tbl_student` SET `account_status_id`='".$this->STATUS_CANCELLED."', `cancel_message`='".$cancel_message."' WHERE id = ".$id."";

        if($this->con->query($sql) === TRUE)
        {
            $data = array(
                'response' => $this->SUCCESS_RESPONSE,
                'message' => "Success, You have successfully update the status of this account."
            );
        }
        else
        {
            $data = array(
                'response' => $this->FAILED_RESPONSE,
                'message' => "Failed, "  . $sql . "<br>" . $this->con->error
            );
        }

        $this->con->close();
        return $data;

	}

	public function updateMultipleStatus($param = array())
	{
        $selectedData = $param['selectedData'];
        $status = $param['status'];
        $data = array();

        $sql = "UPDATE `tbl_student` SET `account_status_id`='".$status."' WHERE id IN (".$selectedData.")";

        if($this->con->query($sql) === TRUE)
        {
            $data = array(
                'response' => $this->SUCCESS_RESPONSE,
                'message' => "Success, You have successfully update the status of this accounts."
            );
        }
        else
        {
            $data = array(
                'response' => $this->FAILED_RESPONSE,
                'message' => "Failed, "  . $sql . "<br>" . $this->con->error
            );
        }

        $this->con->close();
        return $data;

	}
}
