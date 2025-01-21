<?php

require_once 'User.php';

class Admin extends User
{
   // Propriété constante pour définir le rôle de l'Admin
   private const ROLE = 'admin';

   public function __construct($name, $email, $password, $status = 'active')
   {
      // Appeler le constructeur parent avec le rôle spécifique
      parent::__construct($name, $email, $password, self::ROLE, $status);
   }

   // Méthode pour obtenir des statistiques globales
   public function getGlobalStatistics($dbConnection)
   {
      $query = "SELECT 
                    (SELECT COUNT(*) FROM users) AS total_users, 
                    (SELECT COUNT(*) FROM courses) AS total_courses, 
                    (SELECT COUNT(*) FROM enrolments) AS total_enrolments ";

      $stmt = $dbConnection->prepare($query);
      $stmt->execute();

      return $stmt->fetch(PDO::FETCH_ASSOC);
   }

   // Approuver un enseignant
   public static function approveTeacher($db, $teacherId)
   {
      $updateQuery = "UPDATE users SET is_validated = true, is_active = true WHERE id = ?";
      $result = $db->query($updateQuery, [$teacherId]);
      return $result;
   }

   public static function activateUser($db, $user_id)
   {
      $updateQuery = "UPDATE users SET is_active = true WHERE id = ?";
      return $db->query($updateQuery, [$user_id]);
   }

   public static function deactivateUser($db, $user_id)
   {
      $updateQuery = "UPDATE users SET is_active = false WHERE id = ?";
      return $db->query($updateQuery, [$user_id]);
   }

   public static function getAllCourses($db)
   {
      $query = "SELECT c.*, u.name as teacher_name, u.email as teacher_email 
                FROM courses c 
                JOIN users u ON c.instructor_id = u.id 
                ORDER BY c.created_at DESC";
      return $db->query($query)->fetchAll();
   }

   public static function activateCourse($db, $course_id)
   {
      $updateQuery = "UPDATE courses SET is_active = true WHERE id = ?";
      return $db->query($updateQuery, [$course_id]);
   }

   public static function deactivateCourse($db, $course_id)
   {
      $updateQuery = "UPDATE courses SET is_active = false WHERE id = ?";
      return $db->query($updateQuery, [$course_id]);
   }

   public static function deleteCourse($db, $course_id)
   {
      // D'abord, vérifier si le cours existe
      $checkQuery = "SELECT id FROM courses WHERE id = ?";
      $course = $db->query($checkQuery, [$course_id])->fetch();

      if (!$course) {
         return false;
      }

      // Supprimer le cours
      $deleteQuery = "DELETE FROM courses WHERE id = ?";
      return $db->query($deleteQuery, [$course_id]);
   }

   public static function getAllCategories($db)
   {
      $query = "SELECT * FROM categories ORDER BY name ASC";
      return $db->query($query)->fetchAll();
   }

   public static function addCategory($db, $name, $description)
   {
      $query = "INSERT INTO categories (name, description) VALUES (?, ?)";
      return $db->query($query, [$name, $description]);
   }

   public static function updateCategory($db, $id, $name, $description)
   {
      $query = "UPDATE categories SET name = ?, description = ? WHERE id = ?";
      return $db->query($query, [$name, $description, $id]);
   }

   public static function deleteCategory($db, $id)
   {
      $checkQuery = "SELECT COUNT(*) as count FROM courses WHERE category_id = ?";
      $result = $db->query($checkQuery, [$id])->fetch();

      if ($result['count'] > 0) {
         return false; // La catégorie est utilisée, ne pas supprimer
      }

      $query = "DELETE FROM categories WHERE id = ?";
      return $db->query($query, [$id]);
   }

   public static function getAllTags($db)
   {
      $query = "SELECT * FROM tags ORDER BY name ASC";
      return $db->query($query)->fetchAll();
   }

   public static function addTags($db, $tags)
   {
      $success = true;
      foreach ($tags as $tag) {
          $tag = trim($tag);
          if (!empty($tag)) {
              $query = "INSERT INTO tags (name) VALUES (?) ON DUPLICATE KEY UPDATE name = name";
              if (!$db->query($query, [$tag])) {
                  $success = false;
              }
          }
      }
      return $success;
   }

   public static function deleteTag($db, $id)
   {
      // D'abord, supprimer les relations dans la table de liaison
      $deleteRelationsQuery = "DELETE FROM course_tags WHERE tag_id = ?";
      $db->query($deleteRelationsQuery, [$id]);

      // Ensuite, supprimer le tag
      $query = "DELETE FROM tags WHERE id = ?";
      return $db->query($query, [$id]);
   }
}
