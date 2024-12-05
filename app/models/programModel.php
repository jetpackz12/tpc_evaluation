<?php

class programModel extends model
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

        $sql = "SELECT * FROM tbl_program ORDER BY id DESC";
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
        $program_code = $param['program_code'];
        $program_name = $param['program_name'];
        $created_at = date('Y-m-d H:i:s'); 
        $data = array();

        $sql = "SELECT `program_code` FROM `tbl_program` WHERE program_code = '".$program_code."'";
        $result = $this->con->query($sql);
        if($result->num_rows > 0)
        {
            $data = array(
                'response' => $this->FAILED_RESPONSE,
                'message' => "Failed, This program code has already been used."
            );

            return $data;
        }

        $sql = "INSERT INTO `tbl_program`(`program_code`, `program_name`, `status`, `created_at`) VALUES ('".$program_code."','".$program_name."','".$this->ENABLED."','".$created_at."')";

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

        $sql = "SELECT * FROM tbl_program WHERE id = '".$id."'";
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
        $old_program_code = $param['old_program_code'];
        $program_code = $param['program_code'];
        $program_name = $param['program_name'];
        $data = array();

        if ($old_program_code != $program_code) {
            $sql = "SELECT `program_code` FROM `tbl_program` WHERE program_code = '".$program_code."'";
            $result = $this->con->query($sql);
            if($result->num_rows > 0)
            {
                $data = array(
                    'response' => $this->FAILED_RESPONSE,
                    'message' => "Failed, This program code has already been used."
                );

                return $data;
            }
        }

        $sql = "UPDATE `tbl_program` SET `program_code`='".$program_code."',`program_name`='".$program_name."' WHERE id = ".$id."";

        if($this->con->query($sql) === TRUE)
        {
            $data = array(
                'response' => $this->SUCCESS_RESPONSE,
                'message' => "Success, You have successfully update this program."
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

        $sql = "UPDATE `tbl_program` SET `status`='".$status."' WHERE id = ".$id."";

        if($this->con->query($sql) === TRUE)
        {
            $data = array(
                'response' => $this->SUCCESS_RESPONSE,
                'message' => "Success, You have successfully update the status of this program."
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

        $sql = "SELECT * FROM tbl_program WHERE status = '".$this->ENABLED."'";
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
