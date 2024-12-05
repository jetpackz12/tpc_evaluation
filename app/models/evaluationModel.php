<?php

class evaluationModel extends model
{
    private $con;
    private $SUCCESS_RESPONSE = '1';
    private $FAILED_RESPONSE = '0';
    private $DISABLED = '0';
    private $ENABLED = '1';
    private $HAS_DATA = '1';
    private $HAS_NO_DATA = '0';

    public function __construct()
    {
        $db = new database();
        $this->con = $db->connection();
    }

	public function store($param = array())
	{
        $student_id = $param['student_id'];
        $teacher_id = $param['teacher_id'];
        $subject_id = $param['subject_id'];
        $academic_year = $param['academic_year'];
        $semester_id = $param['semester_id'];
        $face_to_face = $param['face_to_face'];
        $online = $param['online'];
        $knowledge_id = $param['knowledge_id'];
        $question = $param['question'];
        $created_at = date('Y-m-d H:i:s'); 
        $data = array();
		
		for ($i=0; $i < count($face_to_face) ; $i++) {
			$arr_face_to_face_inner = explode('|', $face_to_face[$i]);
			$rate = $arr_face_to_face_inner[0];
			$category_id = $arr_face_to_face_inner[1];
			$modality_id = $arr_face_to_face_inner[2];
			$question_id = $arr_face_to_face_inner[3];

            $sql = "INSERT INTO `tbl_evaluation`(`student_id`, `teacher_id`, `subject_id`, `academicYear`, `semester_id`, `modality_id`, `category_id`, `question_id`, `rate`, `created_at`) VALUES ('".$student_id."','".$teacher_id."','".$subject_id."','".$academic_year."','".$semester_id."','".$modality_id."','".$category_id."','".$question_id."','".$rate."','".$created_at."')";
            if( $this->con->query($sql) === FALSE)
            {
                $data = array(
                    'response' => $this->FAILED_RESPONSE,
                    'message' => "Failed, "  . $sql . "<br>" . $this->con->error
                );

                return $data;
            }
		}
		
		for ($i=0; $i < count($online) ; $i++) {
			$arr_online_inner = explode('|', $online[$i]);
			$rate = $arr_online_inner[0];
			$category_id = $arr_online_inner[1];
			$modality_id = $arr_online_inner[2];
			$question_id = $arr_online_inner[3];

            $sql = "INSERT INTO `tbl_evaluation`(`student_id`, `teacher_id`, `subject_id`, `academicYear`, `semester_id`, `modality_id`, `category_id`, `question_id`, `rate`, `created_at`) VALUES ('".$student_id."','".$teacher_id."','".$subject_id."','".$academic_year."','".$semester_id."','".$modality_id."','".$category_id."','".$question_id."','".$rate."','".$created_at."')";
            if( $this->con->query($sql) === FALSE)
            {
                $data = array(
                    'response' => $this->FAILED_RESPONSE,
                    'message' => "Failed, "  . $sql . "<br>" . $this->con->error
                );

                return $data;
            }
		}
		
		for ($i=0; $i < count($knowledge_id) ; $i++) {
            $sql = "INSERT INTO `tbl_subjectmatter`(`teacher_id`, `student_id`, `subject_id`, `academicYear`, `semester_id`, `subject_matter_question_id`, `response`, `created_at`) VALUES ('".$teacher_id."','".$student_id."','".$subject_id."','".$academic_year."','".$semester_id."','".$knowledge_id[$i]."','".$question[$i]."','".$created_at."')";
            if( $this->con->query($sql) === FALSE)
            {
                $data = array(
                    'response' => $this->FAILED_RESPONSE,
                    'message' => "Failed, "  . $sql . "<br>" . $this->con->error
                );

                return $data;
            }
		}

        $data = array(
            'response' => $this->SUCCESS_RESPONSE,
            'message' => "Success, You have successfully added new data."
        );

        $this->con->close();
        return $data;
	}

	public function edit($param = array())
	{
        $teacher_id = $param['teacher_id'];
        $academic_year = $param['academic_year'];
        $semester = $param['semester'];
        $data = array();

        $sql = "SELECT * FROM view_evaluation WHERE teacher_id = '".$teacher_id."' AND academicYear = '".$academic_year."' AND semester_id = '".$semester."'";
        $result = $this->con->query($sql);
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        $sql = "SELECT *, id AS subject_matter_id FROM tbl_subjectmatter WHERE teacher_id = '".$teacher_id."' AND academicYear = '".$academic_year."' AND semester_id = '".$semester."'";
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

    public function checkInstructor($param = array()) 
    {
        $program = $param['program'];
        $teacher_id = $param['instructor'];
        $semester = $param['semester'];
        $academic_year = $param['academic_year'];
        $data = $this->HAS_NO_DATA;

        $sql = "SELECT * FROM view_evaluation WHERE teacher_id = '".$teacher_id."' AND academicYear = '".$academic_year."' AND semester_id = '".$semester."'";
        $result = $this->con->query($sql);
        if($result->num_rows > 0)
        {
           $data = $this->HAS_DATA;
        }

        $this->con->close();
        return $data;
    }

    public function filter($param = array()) 
    {
        $program_id = $param['program'];
        $data = array();

        if ($program_id > 0) {
            $sql = "SELECT * FROM view_teacher WHERE program_id = '".$program_id."'";
        } else {
            $sql = "SELECT * FROM view_teacher";
        }

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

    public function view($param = array()) 
    {
        $teacher_id = $param['id'];
        $academic_year = $param['academic_year'];
        $semester = $param['semester'];
        $data = array();

        $sql = "SELECT * FROM view_evaluation WHERE teacher_id = '".$teacher_id."' AND academicYear = '".$academic_year."' AND semester_id = '".$semester."'";
        $result = $this->con->query($sql);
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        $sql = "SELECT *, id AS subject_matter_id FROM tbl_subjectmatter WHERE teacher_id = '".$teacher_id."' AND academicYear = '".$academic_year."' AND semester_id = '".$semester."'";
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

    public function retrieveAllData()
    {
        $data = array();

        $sql = "SELECT * FROM view_evaluation";
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
