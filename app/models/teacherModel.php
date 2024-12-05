<?php

class teacherModel extends model
{
    private $con;
    private $SUCCESS_RESPONSE = '1';
    private $FAILED_RESPONSE = '0';
    private $DISABLED = '0';
    private $ENABLED = '1';

    public function __construct()
    {
        $db = new database();
        $this->con = $db->connection();
    }

    public function index($param = array())
	{
        
        $data = array();

        $sql = "SELECT * FROM view_teacher";
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
        $teacher_id = $param['teacher_id'];
        $lastname = $param['lastname'];
        $firstname = $param['firstname'];
        $middlename = $param['middlename'];
        $program = $param['program'];
        $created_at = date('Y-m-d H:i:s'); 
        $data = array();

        $sql = "SELECT `teacherId` FROM `tbl_teacher` WHERE teacherId = '".$teacher_id."'";
        $result = $this->con->query($sql);
        if($result->num_rows > 0)
        {
            $data = array(
                'response' => $this->FAILED_RESPONSE,
                'message' => "Failed, This teacher identification has already been used."
            );

            return $data;
        }

        $sql = "INSERT INTO `tbl_teacher`(`teacherId`, `program_id`, `teacherLastname`, `teacherFirstname`, `teacherMiddlename`, `created_at`) VALUES ('".$teacher_id."','".$program."','".$lastname."','".$firstname."','".$middlename."','".$created_at."')";

        if($this->con->query($sql) === TRUE)
        {
            $data = array(
                'response' => $this->SUCCESS_RESPONSE,
                'message' => "Success, You have successfully added new data."
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

        $sql = "SELECT * FROM tbl_teacher WHERE id = '".$id."'";
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
        $old_teacher_identification = $param['old_teacher_identification'];
        $teacher_id = $param['teacher_id'];
        $lastname = $param['lastname'];
        $firstname = $param['firstname'];
        $middlename = $param['middlename'];
        $program = $param['program'];
        $data = array();

        if ($old_teacher_identification != $teacher_id) {
            $sql = "SELECT `teacherId` FROM `tbl_teacher` WHERE teacherId = '".$teacher_id."'";
            $result = $this->con->query($sql);
            if($result->num_rows > 0)
            {
                $data = array(
                    'response' => $this->FAILED_RESPONSE,
                    'message' => "Failed, This teacher identification has already been used."
                );

                return $data;
            }
        }

        $sql = "UPDATE `tbl_teacher` SET `teacherId`='".$teacher_id."',`program_id`='".$program."',`teacherLastname`='".$lastname."',`teacherFirstname`='".$firstname."',`teacherMiddlename`='".$middlename."' WHERE id = ".$id."";

        if($this->con->query($sql) === TRUE)
        {
            $data = array(
                'response' => $this->SUCCESS_RESPONSE,
                'message' => "Success, You have successfully update this teacher."
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

	public function updateStatus($param = array())
	{
        $id = $param['id'];
        $status = $param['status'] == $this->ENABLED ? $this->DISABLED : $this->ENABLED;
        $data = array();

        $sql = "UPDATE `tbl_teacher` SET `status`='".$status."' WHERE id = ".$id."";

        if($this->con->query($sql) === TRUE)
        {
            $data = array(
                'response' => $this->SUCCESS_RESPONSE,
                'message' => "Success, You have successfully update the status of this teacher."
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

    public function retrieveAllData()
    {
        $data = array();

        $sql = "SELECT * FROM tbl_teacher";
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

    public function getDataByProgram($param = array())
    {
        $id = $param['id'];
        $data = array();

        $sql = "SELECT * FROM tbl_teacher WHERE program_id = '".$id."'";
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

    public function getDataBySemester($param = array())
    {
        $id = $param['id'];
        $program = $param['program'];
        $data = array();

        $sql = "SELECT * FROM tbl_subject WHERE semester_id = '".$id."' AND program_id = '".$program."'";
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
}
