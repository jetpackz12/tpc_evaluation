<?php

class subjectModel extends model
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

        $sql = "SELECT * FROM view_subject";
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
        $subject_code = $param['subject_code'];
        $subject_name = $param['subject_name'];
        $semester = $param['semester'];
        $year_level = $param['year_level'];
        $program = $param['program'];
        $created_at = date('Y-m-d H:i:s'); 
        $data = array();

        $sql = "SELECT `subjectCode` FROM `tbl_subject` WHERE subjectCode = '".$subject_code."'";
        $result = $this->con->query($sql);
        if($result->num_rows > 0)
        {
            $data = array(
                'response' => $this->FAILED_RESPONSE,
                'message' => "Failed, This subject code has already been used."
            );

            return $data;
        }

        $sql = "INSERT INTO `tbl_subject`(`subjectCode`, `subjectName`, `semester_id`, `year_level_id`, `program_id`, `created_at`, `status`) VALUES ('".$subject_code."','".$subject_name."','".$semester."','".$year_level."','".$program."','".$created_at."','".$this->ENABLED."')";

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

        $sql = "SELECT * FROM tbl_subject WHERE id = '".$id."'";
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
        $old_subject_code = $param['old_subject_code'];
        $subject_code = $param['subject_code'];
        $subject_name = $param['subject_name'];
        $semester = $param['semester'];
        $year_level = $param['year_level'];
        $program = $param['program'];
        $data = array();

        if ($old_subject_code != $subject_code) {
            $sql = "SELECT `subjectCode` FROM `tbl_subject` WHERE subjectCode = '".$subject_code."'";
            $result = $this->con->query($sql);
            if($result->num_rows > 0)
            {
                $data = array(
                    'response' => $this->FAILED_RESPONSE,
                    'message' => "Failed, This subject code has already been used."
                );
    
                return $data;
            }
        }

        $sql = "UPDATE `tbl_subject` SET `subjectCode`='".$subject_code."',`subjectName`='".$subject_name."',`semester_id`='".$semester."',`year_level_id`='".$year_level."',`program_id`='".$program."' WHERE id = ".$id."";

        if($this->con->query($sql) === TRUE)
        {
            $data = array(
                'response' => $this->SUCCESS_RESPONSE,
                'message' => "Success, You have successfully update this subject."
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

        $sql = "UPDATE `tbl_subject` SET `status`='".$status."' WHERE id = ".$id."";

        if($this->con->query($sql) === TRUE)
        {
            $data = array(
                'response' => $this->SUCCESS_RESPONSE,
                'message' => "Success, You have successfully update the status of this subject."
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

        $sql = "SELECT * FROM tbl_subject";
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
