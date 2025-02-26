<?php

class yearLevelModel extends model
{
    private $con;

    public function __construct()
    {
        $db = new database();
        $this->con = $db->connection();
    }
    
    public function retrieveAllData()
    {
        $data = array();

        $sql = "SELECT * FROM tbl_year_level";
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
