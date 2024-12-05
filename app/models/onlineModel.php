<?php

class onlineModel extends model
{
    private $con;
    private $SUCCESS_RESPONSE = '1';
    private $FAILED_RESPONSE = '0';
    private $DISABLED = '0';
    private $ENABLED = '1';
    private $ONLINE_MODALITY = '2';

    public function __construct()
    {
        $db = new database();
        $this->con = $db->connection();
    }

    public function index($param = array())
	{
        
        $data = array();

        $sql = "SELECT * FROM view_online_question";
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
        $category_name = $param['category_name'];
        $question = $param['question'];
        $created_at = date('Y-m-d H:i:s'); 
        $data = array();

        $sql = "INSERT INTO `tbl_online_question`(`category_id`, `modality_id`, `question`, `status`, `created_at`) VALUES ('".$category_name."','".$this->ONLINE_MODALITY."','".$question."','".$this->ENABLED."','".$created_at."')";

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

        $sql = "SELECT * FROM tbl_online_question WHERE id = '".$id."'";
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
        $category_name = $param['category_name'];
        $question = $param['question'];
        $data = array();

        $sql = "UPDATE `tbl_online_question` SET `category_id`='".$category_name."',`question`='".$question."' WHERE id = ".$id."";

        if($this->con->query($sql) === TRUE)
        {
            $data = array(
                'response' => $this->SUCCESS_RESPONSE,
                'message' => "Success, You have successfully update this question."
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

        $sql = "UPDATE `tbl_online_question` SET `status`='".$status."' WHERE id = ".$id."";

        if($this->con->query($sql) === TRUE)
        {
            $data = array(
                'response' => $this->SUCCESS_RESPONSE,
                'message' => "Success, You have successfully update the status of this question."
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

        $sql = "SELECT * FROM view_online_question WHERE status = '$this->ENABLED'";
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
