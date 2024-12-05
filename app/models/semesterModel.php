<?php

class semesterModel extends model
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

    public function retrieveAllData()
    {
        $data = array();

        $sql = "SELECT * FROM tbl_semester";
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
