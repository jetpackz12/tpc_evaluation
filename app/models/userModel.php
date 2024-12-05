<?php

class userModel extends model
{
    private $con;

    public function __construct(){
        $db = new database();
        $this->con = $db->connection();
    }

    public function authentication($param=array())
    {
        $username = $param['username'];
        $password = $param['password'];
        $data = array();

        $sql = "SELECT * FROM users WHERE username = '" .$username. "'";
        $result = $this->con->query($sql);

        if($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();

            if(!password_verify($password, $row['password']))
            {
                $data = array(
                    'response' => '0',
                    'message' => "Login failed, Please check your username and password."
                );
                return $data;
            }

            $data = array(
                'response' => '1',
                'message' => "Login success.",
                'data' => $row
            );
        }
        else
        {
            $data = array(
                'response' => '0',
                'message' => "Login failed, Please check your username and password."
            );
        }

        $this->con->close();
        return $data;
    }

}