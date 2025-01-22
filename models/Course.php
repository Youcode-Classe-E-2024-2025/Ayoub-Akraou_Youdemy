<?php

class Course
{
   private $id;
   private $title;
   private $description;
   private $instructorId;
   private $categoryId;
   private $contentType;
   private $contentUrl;
   private $durationMinutes;
   private $price;
   private $isActive;

   public function __construct($title = null, $description = null, $instructorId = null, $categoryId = null, $contentType = 'video', $contentUrl = null, $durationMinutes = 0, $price = 0.00, $isActive = true)
   {
      $this->title = $title;
      $this->description = $description;
      $this->instructorId = $instructorId;
      $this->categoryId = $categoryId;
      $this->contentType = $contentType;
      $this->contentUrl = $contentUrl;
      $this->durationMinutes = $durationMinutes;
      $this->price = $price;
      $this->isActive = $isActive;
   }

   // Setters et Getters
   public function setId($id)
   {
      $this->id = $id;
   }
   public function getId()
   {
      return $this->id;
   }

   public function setTitle($title)
   {
      $this->title = $title;
   }
   public function getTitle()
   {
      return $this->title;
   }

   public function setDescription($description)
   {
      $this->description = $description;
   }
   public function getDescription()
   {
      return $this->description;
   }


   public function setInstructorId($instructorId)
   {
      $this->instructorId = $instructorId;
   }
   public function getInstructorId()
   {
      return $this->instructorId;
   }

   public function setCategoryId($categoryId)
   {
      $this->categoryId = $categoryId;
   }
   public function getCategoryId()
   {
      return $this->categoryId;
   }

   public function setContentType($contentType)
   {
      $this->contentType = $contentType;
   }
   public function getContentType()
   {
      return $this->contentType;
   }

   public function setContentUrl($contentUrl)
   {
      $this->contentUrl = $contentUrl;
   }
   public function getContentUrl()
   {
      return $this->contentUrl;
   }

   public function setDurationMinutes($durationMinutes)
   {
      $this->durationMinutes = $durationMinutes;
   }
   public function getDurationMinutes()
   {
      return $this->durationMinutes;
   }

   public function setPrice($price)
   {
      $this->price = $price;
   }
   public function getPrice()
   {
      return $this->price;
   }

   public function setIsActive($isActive)
   {
      $this->isActive = $isActive;
   }
   public function getIsActive()
   {
      return $this->isActive;
   }

   // Créer un cours
   public function create($db)
   {
      $query = "INSERT INTO courses (
                  title, 
                  description, 
                  instructor_id, 
                  category_id, 
                  content_type,
                  content_url,
                  duration_minutes,
                  price,
                  is_active
               ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

      return $db->query($query, [
         $this->title,
         $this->description,
         $this->instructorId,
         $this->categoryId,
         $this->contentType,
         $this->contentUrl,
         $this->durationMinutes,
         $this->price,
         $this->isActive
      ]);
   }

   // Mettre à jour un cours
   public function update($db, $id)
   {
      $query = "UPDATE courses 
               SET title = ?, 
                   description = ?, 
                   instructor_id = ?, 
                   category_id = ?, 
                   content_type = ?,
                   content_url = ?,
                   duration_minutes = ?,
                   price = ?,
                   is_active = ?
               WHERE id = ?";

      return $db->query($query, [
         $this->title,
         $this->description,
         $this->instructorId,
         $this->categoryId,
         $this->contentType,
         $this->contentUrl,
         $this->durationMinutes,
         $this->price,
         $this->isActive,
         $id
      ]);
   }

   // Supprimer un cours par son ID
   public static function delete($db, $id)
   {
      $query = "DELETE FROM courses WHERE id = ?";
      return $db->query($query, [$id]);
   }

   // Récupérer les détails d'un cours par son ID
   public static function getDetails($db, $id)
   {
      $query = "SELECT c.*, u.name as instructor_name, u.email as instructor_email, 
                cat.name as category_name,
                GROUP_CONCAT(t.name) as tags,
                GROUP_CONCAT(ct.tag_id) as tag_ids
                FROM courses c
                JOIN users u ON c.instructor_id = u.id
                LEFT JOIN categories cat ON c.category_id = cat.id
                LEFT JOIN course_tags ct ON c.id = ct.course_id
                LEFT JOIN tags t ON ct.tag_id = t.id
                WHERE c.id = ?
                GROUP BY c.id";
      return $db->selectOne($query, [$id]);
   }

   // Récupérer une liste paginée de cours
   public function getPaginatedCourses($db, $limit, $offset)
   {
      $query = "SELECT c.*, u.name as instructor_name, u.email as instructor_email,
                cat.name as category_name,
                GROUP_CONCAT(t.name) as tags
                FROM courses c
                JOIN users u ON c.instructor_id = u.id
                LEFT JOIN categories cat ON c.category_id = cat.id
                LEFT JOIN course_tags ct ON c.id = ct.course_id
                LEFT JOIN tags t ON ct.tag_id = t.id
                GROUP BY c.id
                LIMIT " . (int)$limit . " OFFSET " . (int)$offset;
      return $db->select($query);
   }

   // Rechercher des cours par mot-clé (dans le titre ou la description)
   public static function search($db, $keyword)
   {
      $likeKeyword = "%$keyword%";

      $query = "SELECT c.*, u.name as instructor_name, u.email as instructor_email,
                cat.name as category_name,
                GROUP_CONCAT(t.name) as tags
                FROM courses c
                JOIN users u ON c.instructor_id = u.id
                LEFT JOIN categories cat ON c.category_id = cat.id
                LEFT JOIN course_tags ct ON c.id = ct.course_id
                LEFT JOIN tags t ON ct.tag_id = t.id
                WHERE MATCH(c.title, c.description) AGAINST(? IN NATURAL LANGUAGE MODE) 
                OR c.title LIKE ? 
                OR c.description LIKE ?
                OR t.name LIKE ?
                GROUP BY c.id";

      return $db->select($query, [$keyword, $likeKeyword, $likeKeyword, $likeKeyword]);
   }


   // Get total number of courses
   public static function count($db)
   {
      $query = "SELECT COUNT(*) as total FROM courses";
      $result = $db->selectOne($query);
      return $result['total'];
   }

   // Get total revenue from all courses
   public static function totalRevenue($db)
   {
      $query = "SELECT SUM(c.price) as total_revenue 
                FROM courses c 
                JOIN enrollments e ON c.id = e.course_id";
      $result = $db->selectOne($query);
      return $result['total_revenue'] ?? 0; // Return 0 if no enrollments exist
   }

   // Récupérer le nombre total de cours
   public static function getTotalCourses($db)
   {
      $query = "SELECT COUNT(*) as total FROM courses";
      $result = $db->selectOne($query);
      return $result ? $result['total'] : 0;
   }
}
