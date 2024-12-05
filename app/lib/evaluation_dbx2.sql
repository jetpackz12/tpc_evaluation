-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.4.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for evaluation_db
CREATE DATABASE IF NOT EXISTS `evaluation_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `evaluation_db`;

-- Dumping structure for table evaluation_db.tbl_account_status
CREATE TABLE IF NOT EXISTS `tbl_account_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table evaluation_db.tbl_account_status: ~3 rows (approximately)
INSERT INTO `tbl_account_status` (`id`, `description`) VALUES
	(1, 'approved'),
	(2, 'pending'),
	(3, 'cancelled');

-- Dumping structure for table evaluation_db.tbl_category
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(30) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table evaluation_db.tbl_category: ~6 rows (approximately)
INSERT INTO `tbl_category` (`id`, `categoryName`, `status`, `created_at`) VALUES
	(1, 'Classroom Managements', 1, '2024-10-24 19:43:17'),
	(2, 'Interaction and Engagement', 1, '2024-10-24 19:43:17'),
	(3, 'Communication', 1, '2024-10-24 19:43:17'),
	(4, 'Course Design and Technology', 1, '2024-10-24 19:43:17'),
	(5, 'Assessment and Feedback', 1, '2024-10-24 19:43:17'),
	(6, 'Engagement and Interactivity', 1, '2024-10-24 19:43:17');

-- Dumping structure for table evaluation_db.tbl_evaluation
CREATE TABLE IF NOT EXISTS `tbl_evaluation` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` text NOT NULL,
  `academicYear` varchar(20) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `modality_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `rate` int(2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_tbl_evaluation_student_id_tbl_student_id` (`student_id`),
  KEY `FK_tbl_evaluation_teacher_id_tbl_teacher_id` (`teacher_id`),
  KEY `FK_tbl_evaluation_semester_id_tbl_semester_id` (`semester_id`),
  KEY `FK_tbl_evaluation_modality_id_tbl_modality_id` (`modality_id`),
  KEY `FK_tbl_evaluation_category_id_tbl_category_id` (`category_id`),
  KEY `FK_tbl_evaluation_question_id_tbl_question_id` (`question_id`),
  CONSTRAINT `FK_tbl_evaluation_category_id_tbl_category_id` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_evaluation_modality_id_tbl_modality_id` FOREIGN KEY (`modality_id`) REFERENCES `tbl_modality` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_evaluation_question_id_tbl_question_id` FOREIGN KEY (`question_id`) REFERENCES `tbl_question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_evaluation_semester_id_tbl_semester_id` FOREIGN KEY (`semester_id`) REFERENCES `tbl_semester` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_evaluation_student_id_tbl_student_id` FOREIGN KEY (`student_id`) REFERENCES `tbl_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_evaluation_teacher_id_tbl_teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `tbl_teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table evaluation_db.tbl_evaluation: ~0 rows (approximately)

-- Dumping structure for table evaluation_db.tbl_modality
CREATE TABLE IF NOT EXISTS `tbl_modality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modality` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table evaluation_db.tbl_modality: ~2 rows (approximately)
INSERT INTO `tbl_modality` (`id`, `modality`) VALUES
	(1, 'Face to Face'),
	(2, 'Online');

-- Dumping structure for table evaluation_db.tbl_online_question
CREATE TABLE IF NOT EXISTS `tbl_online_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `modality_id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_tbl_online_question_category_id_tbl_category_id` (`category_id`),
  KEY `FK_tbl_online_question_modality_id_tbl_modality_id` (`modality_id`),
  CONSTRAINT `FK_tbl_online_question_category_id_tbl_category_id` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_online_question_modality_id_tbl_modality_id` FOREIGN KEY (`modality_id`) REFERENCES `tbl_modality` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table evaluation_db.tbl_online_question: ~8 rows (approximately)
INSERT INTO `tbl_online_question` (`id`, `category_id`, `modality_id`, `question`, `status`, `created_at`) VALUES
	(1, 1, 2, 'Organization and accessibility of online course material', 1, '2024-10-25 08:31:29'),
	(2, 4, 2, 'Effective use of learning management systems (LMS)', 1, '2024-10-25 08:31:29'),
	(3, 6, 2, 'Use of interactive tools (discussion boards, quizzes,etc.)', 1, '2024-10-25 08:31:29'),
	(4, 6, 2, 'Promotion of student-to- student and student-to-instructor interaction', 1, '2024-10-25 08:31:29'),
	(5, 3, 2, 'Clarity of written instructions and announcements', 1, '2024-10-25 08:31:29'),
	(6, 3, 2, 'Responsiveness to student inquires via email or discussion boards', 1, '2024-10-25 08:31:29'),
	(7, 5, 2, 'Fairness in online grading and assessment', 1, '2024-10-25 08:31:29'),
	(8, 5, 2, 'Timeliness and quality of online feedback on assignments and assessments', 1, '2024-10-25 08:31:29');

-- Dumping structure for table evaluation_db.tbl_program
CREATE TABLE IF NOT EXISTS `tbl_program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `program_code` int(11) NOT NULL,
  `program_name` varchar(25) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table evaluation_db.tbl_program: ~6 rows (approximately)
INSERT INTO `tbl_program` (`id`, `program_code`, `program_name`, `status`, `created_at`) VALUES
	(1, 1001, 'BAEL', 1, '2024-10-21 16:30:47'),
	(2, 1002, 'BSIS', 1, '2024-10-21 16:30:47'),
	(3, 1003, 'BSA', 1, '2024-10-21 16:30:47'),
	(4, 1004, 'BSAIS', 1, '2024-10-21 16:30:47'),
	(5, 1005, 'BECED', 1, '2024-10-21 16:30:47'),
	(6, 1006, 'BSCRIM', 1, '2024-10-21 16:30:47');

-- Dumping structure for table evaluation_db.tbl_question
CREATE TABLE IF NOT EXISTS `tbl_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `modality_id` int(11) DEFAULT NULL,
  `question` varchar(150) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_tbl_question_category_id_tbl_category_id` (`category_id`),
  KEY `FK_tbl_question_modality_id_tbl_modality_id` (`modality_id`),
  CONSTRAINT `FK_tbl_question_category_id_tbl_category_id` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_question_modality_id_tbl_modality_id` FOREIGN KEY (`modality_id`) REFERENCES `tbl_modality` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table evaluation_db.tbl_question: ~14 rows (approximately)
INSERT INTO `tbl_question` (`id`, `category_id`, `modality_id`, `question`, `status`, `created_at`) VALUES
	(1, 1, 1, 'Arrives on time in his/her class and exhibit preparedness in class', 1, '2024-10-24 21:22:25'),
	(2, 1, 1, 'Check attendance and inform students for absences', 1, '2024-10-24 21:22:25'),
	(3, 1, 1, 'Classroom organization and arrangement', 1, '2024-10-24 21:22:25'),
	(4, 1, 1, 'Use of instructional aids and resources', 1, '2024-10-24 21:22:25'),
	(5, 1, 1, 'Encourages participation', 1, '2024-10-24 21:22:25'),
	(6, 1, 1, 'Establishes rapport with students', 1, '2024-10-24 21:22:25'),
	(7, 2, 1, 'Student engagement and participation', 1, '2024-10-24 21:22:25'),
	(8, 2, 1, 'Ability to create a positive classroom atmosphere', 1, '2024-10-24 21:22:25'),
	(9, 3, 1, 'Clarity of verbal communication ', 1, '2024-10-24 21:22:25'),
	(10, 3, 1, 'Effective use of non-verbal comunication (e.g.,body language)', 1, '2024-10-24 21:22:25'),
	(11, 3, 1, 'Explain lessons enthusiastically', 1, '2024-10-24 21:22:25'),
	(12, 5, 1, 'Evaluate students works/outputs', 1, '2024-10-24 21:22:25'),
	(13, 5, 1, 'Fairness in grading and assessment', 1, '2024-10-24 21:22:25'),
	(14, 5, 1, 'Timeliness and quality of feedback on assignments and assessments ', 1, '2024-10-24 21:22:25');

-- Dumping structure for table evaluation_db.tbl_semester
CREATE TABLE IF NOT EXISTS `tbl_semester` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table evaluation_db.tbl_semester: ~2 rows (approximately)
INSERT INTO `tbl_semester` (`id`, `description`) VALUES
	(1, 'First Semester'),
	(2, 'Second Semester');

-- Dumping structure for table evaluation_db.tbl_student
CREATE TABLE IF NOT EXISTS `tbl_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `program_id` int(11) NOT NULL,
  `year_level_id` int(11) NOT NULL,
  `student_status_id` int(11) NOT NULL,
  `studentId` int(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_status_id` int(11) NOT NULL,
  `cancel_message` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_tbl_student_program_id_tbl_program_id` (`program_id`),
  KEY `FK_tbl_student_year_level_id_tbl_year_level_id` (`year_level_id`),
  KEY `FK_tbl_student_student_status_id_tbl_student_status_id` (`student_status_id`),
  KEY `FK_tbl_student_account_status_id_tbl_account_status_id` (`account_status_id`),
  CONSTRAINT `FK_tbl_student_account_status_id_tbl_account_status_id` FOREIGN KEY (`account_status_id`) REFERENCES `tbl_account_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_student_program_id_tbl_program_id` FOREIGN KEY (`program_id`) REFERENCES `tbl_program` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_student_student_status_id_tbl_student_status_id` FOREIGN KEY (`student_status_id`) REFERENCES `tbl_student_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_student_year_level_id_tbl_year_level_id` FOREIGN KEY (`year_level_id`) REFERENCES `tbl_year_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table evaluation_db.tbl_student: ~15 rows (approximately)
INSERT INTO `tbl_student` (`id`, `lastname`, `firstname`, `middlename`, `program_id`, `year_level_id`, `student_status_id`, `studentId`, `password`, `account_status_id`, `cancel_message`, `created_at`) VALUES
	(1, 'Monticod', 'Euludosa ', 'Tubalado', 1, 2, 1, 123456, '$2y$10$cdyk37V49gCZzqIMAQb4MOIoWGlFexg6sEiBxppFQGH8fS2vizUJ2', 2, 'das', '2024-12-05 11:30:07'),
	(2, '', 'Euludosa ', 'Tubalado', 1, 1, 1, 0, '$2y$10$cdyk37V49gCZzqIMAQb4MOIoWGlFexg6sEiBxppFQGH8fS2vizUJ2', 2, 'dasda', '2024-12-05 11:30:08'),
	(3, 'Monticod', 'Euludosa ', 'b', 1, 1, 1, 462321, '$2y$10$cdyk37V49gCZzqIMAQb4MOIoWGlFexg6sEiBxppFQGH8fS2vizUJ2', 2, 'dsadsa', '2024-12-05 11:30:09'),
	(4, 'Jame', 'bryans', 't', 1, 1, 1, 79466, '$2y$10$cdyk37V49gCZzqIMAQb4MOIoWGlFexg6sEiBxppFQGH8fS2vizUJ2', 2, 'dasdas', '2024-12-05 11:30:10'),
	(5, 'James', 'bryans', 't', 1, 1, 1, 44666, '$2y$10$cdyk37V49gCZzqIMAQb4MOIoWGlFexg6sEiBxppFQGH8fS2vizUJ2', 2, 'adsda', '2024-12-05 11:30:10'),
	(6, 'Monticod', 'bryans', 't', 1, 1, 1, 462326, '$2y$10$cdyk37V49gCZzqIMAQb4MOIoWGlFexg6sEiBxppFQGH8fS2vizUJ2', 2, 'dasdas', '2024-12-05 11:30:11'),
	(7, 'Monticod', 'bryans', 'Tubalado', 1, 1, 1, 66565623, '$2y$10$cdyk37V49gCZzqIMAQb4MOIoWGlFexg6sEiBxppFQGH8fS2vizUJ2', 2, 'dasdas', '2024-12-05 11:30:12'),
	(8, 'camerons', 'Lee Sandra', 'b', 1, 1, 2, 7365675, '$2y$10$cdyk37V49gCZzqIMAQb4MOIoWGlFexg6sEiBxppFQGH8fS2vizUJ2', 2, 'dsadsa', '2024-12-05 11:30:12'),
	(9, 'James', 'Euludosa ', '', 1, 1, 1, 631323, '$2y$10$cdyk37V49gCZzqIMAQb4MOIoWGlFexg6sEiBxppFQGH8fS2vizUJ2', 2, NULL, '2024-12-05 11:30:13'),
	(10, 'Monticod', 'Lee Sandra', 'Tubalado', 1, 1, 1, 20241001, '$2y$10$cdyk37V49gCZzqIMAQb4MOIoWGlFexg6sEiBxppFQGH8fS2vizUJ2', 2, NULL, '2024-12-05 11:30:14'),
	(11, 'Gablino', 'Angelene', 'A', 2, 3, 1, 20241006, '$2y$10$cdyk37V49gCZzqIMAQb4MOIoWGlFexg6sEiBxppFQGH8fS2vizUJ2', 2, NULL, '2024-12-05 11:30:15'),
	(12, 'Galvez', 'Dianne', 'G', 2, 3, 1, 20241007, '$2y$10$cdyk37V49gCZzqIMAQb4MOIoWGlFexg6sEiBxppFQGH8fS2vizUJ2', 2, NULL, '2024-12-05 11:30:15'),
	(13, 'Cajes', 'Cherry', 'Tan', 1, 2, 1, 202410020, '$2y$10$cdyk37V49gCZzqIMAQb4MOIoWGlFexg6sEiBxppFQGH8fS2vizUJ2', 2, 'You have create an account already please ask administrator', '2024-12-02 14:34:55'),
	(14, 'Cajes', 'Ryan', 't', 1, 1, 1, 202410030, '$2y$10$cdyk37V49gCZzqIMAQb4MOIoWGlFexg6sEiBxppFQGH8fS2vizUJ2', 2, NULL, '2024-12-05 11:30:16'),
	(15, 'Ligan', 'ghost', 'B', 5, 4, 2, 202410031, '$2y$10$cdyk37V49gCZzqIMAQb4MOIoWGlFexg6sEiBxppFQGH8fS2vizUJ2', 2, NULL, '2024-12-05 11:30:17');

-- Dumping structure for table evaluation_db.tbl_student_status
CREATE TABLE IF NOT EXISTS `tbl_student_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table evaluation_db.tbl_student_status: ~2 rows (approximately)
INSERT INTO `tbl_student_status` (`id`, `description`) VALUES
	(1, 'Regular Student'),
	(2, 'Irregular Student');

-- Dumping structure for table evaluation_db.tbl_subject
CREATE TABLE IF NOT EXISTS `tbl_subject` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `subjectCode` int(8) NOT NULL,
  `subjectName` varchar(30) NOT NULL,
  `semester_id` int(1) NOT NULL,
  `year_level_id` int(1) NOT NULL,
  `program_id` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_tbl_subject_semester_id_tbl_semester_id` (`semester_id`),
  KEY `FK_tbl_subject_year_level_id_tbl_year_level_id` (`year_level_id`),
  KEY `FK_tbl_subject_program_id_tbl_program_id` (`program_id`),
  CONSTRAINT `FK_tbl_subject_program_id_tbl_program_id` FOREIGN KEY (`program_id`) REFERENCES `tbl_program` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_subject_semester_id_tbl_semester_id` FOREIGN KEY (`semester_id`) REFERENCES `tbl_semester` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_subject_year_level_id_tbl_year_level_id` FOREIGN KEY (`year_level_id`) REFERENCES `tbl_year_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table evaluation_db.tbl_subject: ~5 rows (approximately)
INSERT INTO `tbl_subject` (`id`, `subjectCode`, `subjectName`, `semester_id`, `year_level_id`, `program_id`, `status`, `created_at`) VALUES
	(1, 1002, 'Information System Analysis an', 1, 1, 1, 1, '2024-10-24 19:05:12'),
	(2, 1003, 'Mathematic in the Modern World', 1, 2, 1, 1, '2024-10-24 19:05:12'),
	(3, 1004, 'English 1', 1, 1, 2, 1, '2024-10-24 19:05:12'),
	(4, 1005, 'English 2', 2, 1, 2, 1, '2024-10-24 19:05:12'),
	(5, 1006, 'English 3', 1, 2, 2, 1, '2024-10-24 19:05:12');

-- Dumping structure for table evaluation_db.tbl_subjectmatter
CREATE TABLE IF NOT EXISTS `tbl_subjectmatter` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` text NOT NULL,
  `academicYear` varchar(30) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `subject_matter_question_id` int(11) NOT NULL,
  `response` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_tbl_subjectmatter_teacher_id_tbl_teacher_id` (`teacher_id`),
  KEY `FK_tbl_subjectmatter_student_id_tbl_student_id` (`student_id`),
  KEY `FK_tbl_subjectmatter_semeter_id_tbl_semester_id` (`semester_id`),
  KEY `FK_tbl_subjectmatter_subject_matter_id_tbl_subject_matter_id` (`subject_matter_question_id`),
  CONSTRAINT `FK_tbl_subjectmatter_semeter_id_tbl_semester_id` FOREIGN KEY (`semester_id`) REFERENCES `tbl_semester` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_subjectmatter_student_id_tbl_student_id` FOREIGN KEY (`student_id`) REFERENCES `tbl_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_subjectmatter_subject_matter_id_tbl_subject_matter_id` FOREIGN KEY (`subject_matter_question_id`) REFERENCES `tbl_subject_matter_question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_subjectmatter_teacher_id_tbl_teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `tbl_teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table evaluation_db.tbl_subjectmatter: ~0 rows (approximately)

-- Dumping structure for table evaluation_db.tbl_subject_matter_question
CREATE TABLE IF NOT EXISTS `tbl_subject_matter_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table evaluation_db.tbl_subject_matter_question: ~2 rows (approximately)
INSERT INTO `tbl_subject_matter_question` (`id`, `question`, `status`, `created_at`) VALUES
	(1, 'What can you say about the instructor\'s expertise or depth of knowledge in the subject matter?', 1, '2024-10-25 09:10:12'),
	(2, 'What areas need improvement in terms of his or her expertise in the subject matter?', 1, '2024-10-25 09:12:38');

-- Dumping structure for table evaluation_db.tbl_teacher
CREATE TABLE IF NOT EXISTS `tbl_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacherId` int(20) NOT NULL,
  `program_id` int(11) NOT NULL,
  `teacherLastname` varchar(30) NOT NULL,
  `teacherFirstname` varchar(30) NOT NULL,
  `teacherMiddlename` varchar(30) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_programi_id_tbl_program_id` (`program_id`),
  CONSTRAINT `FK_programi_id_tbl_program_id` FOREIGN KEY (`program_id`) REFERENCES `tbl_program` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table evaluation_db.tbl_teacher: ~10 rows (approximately)
INSERT INTO `tbl_teacher` (`id`, `teacherId`, `program_id`, `teacherLastname`, `teacherFirstname`, `teacherMiddlename`, `status`, `created_at`) VALUES
	(1, 1002, 1, 'AUGUIS', 'EMMANUEL', 'A', 1, '2024-10-22 07:33:52'),
	(2, 1003, 1, 'AUTIDA,', 'MAFE', 'R', 1, '2024-10-22 07:33:52'),
	(3, 1004, 1, 'AUXILIO', 'MIKHAIL DAVID', 'I', 1, '2024-10-22 07:33:52'),
	(4, 1005, 1, 'AUXTERO', 'VANISSA', 'L', 1, '2024-10-22 07:33:52'),
	(5, 1007, 1, 'BACARON', 'JUVENILE', 'B', 1, '2024-10-22 07:33:52'),
	(6, 1008, 1, 'CABANES', 'MARK ANTHONY ', 'A', 1, '2024-10-22 07:33:52'),
	(7, 1009, 3, 'CAJES', 'DOMINGO', 'A', 1, '2024-10-22 07:33:52'),
	(8, 10010, 1, 'CAJES', ', NEIL NOLAN', 'B', 1, '2024-10-22 07:33:52'),
	(9, 10011, 1, 'CARANZO', 'ALVIC', 'A', 1, '2024-10-22 07:33:52'),
	(10, 10013, 2, 'CRESCENCIO', 'IRENE', 'T', 1, '2024-10-22 07:33:52');

-- Dumping structure for table evaluation_db.tbl_year_level
CREATE TABLE IF NOT EXISTS `tbl_year_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table evaluation_db.tbl_year_level: ~4 rows (approximately)
INSERT INTO `tbl_year_level` (`id`, `description`) VALUES
	(1, 'First Year'),
	(2, 'Second Year'),
	(3, 'Third Year'),
	(4, 'Fourth Year');

-- Dumping structure for table evaluation_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table evaluation_db.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `name`, `username`, `password`, `created_at`) VALUES
	(1, 'rose', 'admin', '$2y$10$YUzBLXGiw4Ph6iSYqDriCerTfd3gdZgDj3QofGLfqYpTS9B9ZKCx.', '2024-03-29 09:04:36');

-- Dumping structure for view evaluation_db.view_approved_students
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_approved_students` (
	`id` INT(11) NOT NULL,
	`lastname` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`firstname` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`middlename` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`program_code` INT(11) NOT NULL,
	`program_name` VARCHAR(25) NOT NULL COLLATE 'utf8mb4_general_ci',
	`year_level` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`student_status` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`account_status` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`studentId` INT(20) NOT NULL,
	`password` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`cancel_message` TEXT NULL COLLATE 'utf8mb4_general_ci',
	`created_at` DATETIME NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view evaluation_db.view_cancelled_students
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_cancelled_students` (
	`id` INT(11) NOT NULL,
	`lastname` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`firstname` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`middlename` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`program_code` INT(11) NOT NULL,
	`program_name` VARCHAR(25) NOT NULL COLLATE 'utf8mb4_general_ci',
	`year_level` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`student_status` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`account_status` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`studentId` INT(20) NOT NULL,
	`password` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`cancel_message` TEXT NULL COLLATE 'utf8mb4_general_ci',
	`created_at` DATETIME NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view evaluation_db.view_evaluation
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_evaluation` (
	`id` INT(11) NOT NULL,
	`academicYear` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`student_name` VARCHAR(92) NOT NULL COLLATE 'utf8mb4_general_ci',
	`program_id` INT(11) NOT NULL,
	`program_code` INT(11) NOT NULL,
	`program_name` VARCHAR(25) NOT NULL COLLATE 'utf8mb4_general_ci',
	`year_level` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`student_status` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`account_status` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`teacher_id` INT(11) NOT NULL,
	`teacher_name` VARCHAR(92) NOT NULL COLLATE 'utf8mb4_general_ci',
	`subject_id` MEDIUMTEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`semester_id` INT(11) NOT NULL,
	`semester` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`modality` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`categoryName` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`category_id` INT(11) NULL,
	`modality_id` INT(11) NULL,
	`question_id` INT(11) NOT NULL,
	`question` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_general_ci',
	`rate` INT(11) NOT NULL,
	`created_at` DATETIME NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view evaluation_db.view_evaluation_face_to_face
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_evaluation_face_to_face` (
	`id` INT(10) NOT NULL,
	`academicYear` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`student_name` VARCHAR(92) NOT NULL COLLATE 'utf8mb4_general_ci',
	`program_id` INT(11) NOT NULL,
	`program_code` INT(11) NOT NULL,
	`program_name` VARCHAR(25) NOT NULL COLLATE 'utf8mb4_general_ci',
	`year_level` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`student_status` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`account_status` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`teacher_id` INT(11) NOT NULL,
	`teacher_name` VARCHAR(92) NOT NULL COLLATE 'utf8mb4_general_ci',
	`subject_id` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`semester_id` INT(11) NOT NULL,
	`semester` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`modality` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`categoryName` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`category_id` INT(11) NULL,
	`modality_id` INT(11) NULL,
	`question_id` INT(11) NOT NULL,
	`question` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_general_ci',
	`rate` INT(2) NOT NULL,
	`created_at` DATETIME NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view evaluation_db.view_evaluation_onlie
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_evaluation_onlie` (
	`id` INT(10) NOT NULL,
	`academicYear` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`student_name` VARCHAR(92) NOT NULL COLLATE 'utf8mb4_general_ci',
	`program_id` INT(11) NOT NULL,
	`program_code` INT(11) NOT NULL,
	`program_name` VARCHAR(25) NOT NULL COLLATE 'utf8mb4_general_ci',
	`year_level` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`student_status` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`account_status` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`teacher_id` INT(11) NOT NULL,
	`teacher_name` VARCHAR(92) NOT NULL COLLATE 'utf8mb4_general_ci',
	`subject_id` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`semester_id` INT(11) NOT NULL,
	`semester` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`modality` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`categoryName` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`category_id` INT(11) NOT NULL,
	`modality_id` INT(11) NOT NULL,
	`question_id` INT(11) NOT NULL,
	`question` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`rate` INT(2) NOT NULL,
	`created_at` DATETIME NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view evaluation_db.view_face_to_face_question
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_face_to_face_question` (
	`id` INT(11) NOT NULL,
	`category_id` INT(11) NULL,
	`categoryName` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`modality_id` INT(11) NULL,
	`modality` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`question` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_general_ci',
	`status` INT(1) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view evaluation_db.view_online_question
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_online_question` (
	`id` INT(11) NOT NULL,
	`category_id` INT(11) NOT NULL,
	`categoryName` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`modality_id` INT(11) NOT NULL,
	`modality` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`question` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`status` INT(1) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view evaluation_db.view_pending_students
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_pending_students` (
	`id` INT(11) NOT NULL,
	`lastname` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`firstname` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`middlename` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`program_code` INT(11) NOT NULL,
	`program_name` VARCHAR(25) NOT NULL COLLATE 'utf8mb4_general_ci',
	`year_level` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`student_status` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`account_status` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`studentId` INT(20) NOT NULL,
	`password` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`cancel_message` TEXT NULL COLLATE 'utf8mb4_general_ci',
	`created_at` DATETIME NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view evaluation_db.view_students
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_students` (
	`id` INT(11) NOT NULL,
	`lastname` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`firstname` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`middlename` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`program_code` INT(11) NOT NULL,
	`program_name` VARCHAR(25) NOT NULL COLLATE 'utf8mb4_general_ci',
	`year_level` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`student_status` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`account_status` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`studentId` INT(20) NOT NULL,
	`password` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`cancel_message` TEXT NULL COLLATE 'utf8mb4_general_ci',
	`created_at` DATETIME NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view evaluation_db.view_subject
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_subject` (
	`id` INT(1) NOT NULL,
	`subjectCode` INT(8) NOT NULL,
	`subjectName` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`semester` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`year_level` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`program_code` INT(11) NOT NULL,
	`program_name` VARCHAR(25) NOT NULL COLLATE 'utf8mb4_general_ci',
	`status` INT(1) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view evaluation_db.view_teacher
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_teacher` (
	`id` INT(11) NOT NULL,
	`teacherId` INT(20) NOT NULL,
	`program_id` INT(11) NOT NULL,
	`program_code` INT(11) NOT NULL,
	`program_name` VARCHAR(25) NOT NULL COLLATE 'utf8mb4_general_ci',
	`teacherLastname` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`teacherFirstname` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`teacherMiddlename` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_general_ci',
	`status` INT(1) NOT NULL
) ENGINE=MyISAM;

-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_approved_students`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_approved_students` AS SELECT a.id, a.lastname, a.firstname, a.middlename, b.program_code, b.program_name, c.description AS year_level, d.description AS student_status,
e.description AS account_status, a.studentId, a.password, a.cancel_message, a.created_at
FROM tbl_student AS a
INNER JOIN tbl_program AS b ON a.program_id = b.id
INNER JOIN tbl_year_level AS c ON a.year_level_id = c.id
INNER JOIN tbl_student_status AS d ON a.student_status_id = d.id
INNER JOIN tbl_account_status AS e ON a.account_status_id = e.id
WHERE a.account_status_id = 1
ORDER BY a.id ;

-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_cancelled_students`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_cancelled_students` AS SELECT a.id, a.lastname, a.firstname, a.middlename, b.program_code, b.program_name, c.description AS year_level, d.description AS student_status,
e.description AS account_status, a.studentId, a.password, a.cancel_message, a.created_at
FROM tbl_student AS a
INNER JOIN tbl_program AS b ON a.program_id = b.id
INNER JOIN tbl_year_level AS c ON a.year_level_id = c.id
INNER JOIN tbl_student_status AS d ON a.student_status_id = d.id
INNER JOIN tbl_account_status AS e ON a.account_status_id = e.id
WHERE a.account_status_id = 3
ORDER BY a.id ;

-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_evaluation`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_evaluation` AS SELECT * FROM view_evaluation_face_to_face
UNION ALL
SELECT * FROM view_evaluation_onlie
ORDER BY id ;

-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_evaluation_face_to_face`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_evaluation_face_to_face` AS SELECT a.id, a.academicYear, CONCAT(b.lastname, ' ', b.firstname, ' ', b.middlename) AS student_name, 
sa.id AS program_id, sa.program_code, sa.program_name, sb.description AS year_level, sc.description AS student_status,
sd.description AS account_status, c.id AS teacher_id, CONCAT(c.teacherLastname, ' ', c.teacherFirstname, ' ', c.teacherMiddlename) AS teacher_name,
a.subject_id, e.id AS semester_id, e.description AS semester, f.modality, g.categoryName, h.category_id, h.modality_id, h.id AS question_id, h.question, a.rate, a.created_at
FROM tbl_evaluation AS a
INNER JOIN tbl_student AS b ON a.student_id = b.id
INNER JOIN tbl_program AS sa ON b.program_id = sa.id
INNER JOIN tbl_year_level AS sb ON b.year_level_id = sb.id
INNER JOIN tbl_student_status AS sc ON b.student_status_id = sc.id
INNER JOIN tbl_account_status AS sd ON b.account_status_id = sd.id
INNER JOIN tbl_teacher AS c ON a.teacher_id = c.id
INNER JOIN tbl_semester AS e ON a.semester_id = e.id
INNER JOIN tbl_modality AS f ON a.modality_id = f.id
INNER JOIN tbl_category AS g ON a.category_id = g.id
INNER JOIN tbl_question AS h ON a.question_id = h.id
WHERE a.modality_id = 1
ORDER BY a.id ;

-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_evaluation_onlie`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_evaluation_onlie` AS SELECT a.id, a.academicYear, CONCAT(b.lastname, ' ', b.firstname, ' ', b.middlename) AS student_name, 
sa.id AS program_id, sa.program_code, sa.program_name, sb.description AS year_level, sc.description AS student_status,
sd.description AS account_status, c.id AS teacher_id, CONCAT(c.teacherLastname, ' ', c.teacherFirstname, ' ', c.teacherMiddlename) AS teacher_name,
a.subject_id, e.id AS semester_id, e.description AS semester, f.modality, g.categoryName, h.category_id, h.modality_id, h.id AS question_id, h.question, a.rate, a.created_at
FROM tbl_evaluation AS a
INNER JOIN tbl_student AS b ON a.student_id = b.id
INNER JOIN tbl_program AS sa ON b.program_id = sa.id
INNER JOIN tbl_year_level AS sb ON b.year_level_id = sb.id
INNER JOIN tbl_student_status AS sc ON b.student_status_id = sc.id
INNER JOIN tbl_account_status AS sd ON b.account_status_id = sd.id
INNER JOIN tbl_teacher AS c ON a.teacher_id = c.id
INNER JOIN tbl_semester AS e ON a.semester_id = e.id
INNER JOIN tbl_modality AS f ON a.modality_id = f.id
INNER JOIN tbl_category AS g ON a.category_id = g.id
INNER JOIN tbl_online_question AS h ON a.question_id = h.id
WHERE a.modality_id = 2
ORDER BY a.id ;

-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_face_to_face_question`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_face_to_face_question` AS SELECT a.id, a.category_id, b.categoryName, a.modality_id, c.modality, a.question, a.status FROM tbl_question AS a
INNER JOIN tbl_category AS b ON a.category_id = b.id
INNER JOIN tbl_modality AS c ON a.modality_id = c.id 
ORDER BY id DESC ;

-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_online_question`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_online_question` AS SELECT a.id, a.category_id, b.categoryName, a.modality_id, c.modality, a.question, a.status FROM tbl_online_question AS a
INNER JOIN tbl_category AS b ON a.category_id = b.id
INNER JOIN tbl_modality AS c ON a.modality_id = c.id 
ORDER BY id DESC ;

-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_pending_students`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_pending_students` AS SELECT a.id, a.lastname, a.firstname, a.middlename, b.program_code, b.program_name, c.description AS year_level, d.description AS student_status,
e.description AS account_status, a.studentId, a.password, a.cancel_message, a.created_at
FROM tbl_student AS a
INNER JOIN tbl_program AS b ON a.program_id = b.id
INNER JOIN tbl_year_level AS c ON a.year_level_id = c.id
INNER JOIN tbl_student_status AS d ON a.student_status_id = d.id
INNER JOIN tbl_account_status AS e ON a.account_status_id = e.id
WHERE a.account_status_id = 2
ORDER BY a.id DESC ;

-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_students`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_students` AS SELECT a.id, a.lastname, a.firstname, a.middlename, b.program_code, b.program_name, c.description AS year_level, d.description AS student_status,
e.description AS account_status, a.studentId, a.password, a.cancel_message, a.created_at
FROM tbl_student AS a
INNER JOIN tbl_program AS b ON a.program_id = b.id
INNER JOIN tbl_year_level AS c ON a.year_level_id = c.id
INNER JOIN tbl_student_status AS d ON a.student_status_id = d.id
INNER JOIN tbl_account_status AS e ON a.account_status_id = e.id
ORDER BY a.id ;

-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_subject`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_subject` AS SELECT a.id, a.subjectCode, a.subjectName, b.description AS semester, c.description AS year_level, d.program_code, d.program_name, a.status FROM tbl_subject AS a
INNER JOIN tbl_semester AS b ON a.semester_id = b.id
INNER JOIN tbl_year_level AS c ON a.year_level_id = c.id
INNER JOIN tbl_program AS d ON a.program_id = d.id 
ORDER BY a.id DESC ;

-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_teacher`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_teacher` AS SELECT a.id, a.teacherId, b.id AS program_id, b.program_code, b.program_name, a.teacherLastname, a.teacherFirstname, a.teacherMiddlename, a.status 
FROM tbl_teacher AS a
INNER JOIN tbl_program AS b ON a.program_id = b.id
ORDER BY a.id DESC ;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
