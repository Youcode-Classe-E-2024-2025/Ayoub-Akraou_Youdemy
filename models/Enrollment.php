<?php

class Enrollment
{
   private $student_id;
   private $course_id;

   public function __construct($student_id, $course_id)
   {
      $this->student_id = $student_id;
      $this->course_id = $course_id;
   }

   // Méthode pour créer une nouvelle inscription
   public function create($db)
   {
      $sql = "INSERT INTO enrollments (student_id, course_id) VALUES (?, ?)";
      return $db->query($sql, [$this->student_id, $this->course_id]);
   }

   // Méthode pour supprimer une inscription
   public function delete($db)
   {
      $sql = "DELETE FROM enrollments WHERE student_id = ? AND course_id = ?";
      return $db->query($sql, [$this->student_id, $this->course_id]);
   }

   // Méthode pour récupérer les inscriptions liées à un enseignant
   public static function getEnrollmentsByTeacher($db, $teacher_id)
   {
      $sql = "SELECT enrollments.*, courses.name AS course_name, students.name AS student_name FROM enrollments INNER JOIN courses ON enrollments.course_id = courses.id INNER JOIN users AS students ON enrollments.student_id = students.id WHERE courses.teacher_id = ?";
      return $db->select($sql, [$teacher_id]);
   }

   public function isEnrolledToCourse($db) {
      $sql = "SELECT COUNT(*) as count FROM enrollments WHERE student_id = ? AND course_id = ?";
      $result = $db->selectOne($sql, [$this->student_id, $this->course_id]);
      return $result['count'] > 0;
   }

   public static function count($db)
   {
       $query = "SELECT COUNT(*) as total FROM enrollments";
       $result = $db->selectOne($query);
       return $result['total'];
   }
}
