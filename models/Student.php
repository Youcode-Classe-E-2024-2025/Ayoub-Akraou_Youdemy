<?php

require_once 'User.php';

class Student extends User
{
   // Propriété constante pour définir le rôle du Student
   public const ROLE = 'student';

   public function __construct($name, $email, $password, $status = 'active')
   {
      // Appeler le constructeur parent avec le rôle spécifique
      parent::__construct($name, $email, $password, self::ROLE, $status);
   }
   // Méthode pour récupérer les cours où un étudiant est inscrit
   public static function getCourses($db, $student_id = null)
   {
      $sql = "SELECT 
                courses.*, 
                categories.name as category_name,
                GROUP_CONCAT(tags.name) as tags
              FROM enrollments 
              INNER JOIN courses ON enrollments.course_id = courses.id
              LEFT JOIN categories ON courses.category_id = categories.id
              LEFT JOIN course_tags ON courses.id = course_tags.course_id
              LEFT JOIN tags ON course_tags.tag_id = tags.id
              WHERE enrollments.student_id = ?
              GROUP BY courses.id";
      return $db->select($sql, [$student_id]);
   }

}