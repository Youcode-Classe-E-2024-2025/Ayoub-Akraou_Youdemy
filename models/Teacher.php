<?php
require_once 'User.php';

class Teacher extends User
{
   private const ROLE = 'teacher';

   public function __construct($name = '', $email = '', $password = '', $status = 'active')
   {
      parent::__construct($name, $email, $password, self::ROLE, $status);
   }

   // Méthode pour obtenir les statistiques d'enseignement
   public static function getStatistic($db, $teacherId)
   {
      // Get total number of students
      $n_total_students = $db->selectOne("SELECT COUNT(e.student_id) as n_total_students
                       FROM courses c
                       LEFT JOIN enrollments e ON c.id = e.course_id
                       WHERE c.instructor_id = ?", [$teacherId])['n_total_students'] ?? 0;

      // Get number of courses
      $n_courses = $db->selectOne("SELECT COUNT(*) as n_courses
                      FROM courses 
                      WHERE instructor_id = ?", [$teacherId])['n_courses'] ?? 0;

      // Get total revenue (price * number of students for each course)
      $total_revenue = $db->selectOne("SELECT SUM(c.price * student_count) as total_revenue
                      FROM (
                          SELECT c.id, c.price, COUNT(e.student_id) as student_count
                          FROM courses c
                          LEFT JOIN enrollments e ON c.id = e.course_id
                          WHERE c.instructor_id = ?
                          GROUP BY c.id, c.price
                      ) as c", [$teacherId])['total_revenue'] ?? 0;

      return [
         'n_total_students' => $n_total_students,
         'n_courses' => $n_courses,
         'total_revenue' => $total_revenue
      ];
   }

   // Méthode pour récupérer les cours enseignés par le Teacher avec le nombre d'étudiants
   public static function getCourses($db, $teacherId = null)
   {
      $query = "SELECT 
                  c.*,
                  COUNT(e.student_id) as student_count
               FROM courses c
               LEFT JOIN enrollments e ON c.id = e.course_id
               WHERE c.instructor_id = ?
               GROUP BY c.id";

      return $db->select($query, [$teacherId]);
   }

   // Récupérer les enseignants non validés
   public static function getUnvalidatedTeachers($db)
   {
      $query = "SELECT u.* 
                FROM users u 
                JOIN roles r ON u.role_id = r.id 
                WHERE r.name = ? 
                AND u.is_validated = false 
                ORDER BY u.created_at DESC";
      
      return $db->select($query, [self::ROLE]);
   }
}