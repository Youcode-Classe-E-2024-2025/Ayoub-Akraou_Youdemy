<?php
class Tag
{
   private $id;
   private $name;
   private $created_at;
   private $db;

   public function __construct($db)
   {
      $this->db = $db;
   }

   // Setters and getters
   public function setName($name)
   {
      $this->name = $name;
   }

   public function getName()
   {
      return $this->name;
   }

   // Create a new tag
   public function create()
   {
      $query = "INSERT INTO tags (name) VALUES (:name)";
      $stmt = $this->db->prepare($query);
      $stmt->bindParam(':name', $this->name);
      return $stmt->execute();
   }

   // Create multiple tags at once
   public function createMultiple($tags)
   {
      $query = "INSERT INTO tags (name) VALUES ";
      $values = [];
      foreach ($tags as $tag) {
         $values[] = "(:name_" . $tag . ")";
      }
      $query .= implode(", ", $values);
      $stmt = $this->db->prepare($query);
      foreach ($tags as $tag) {
         $stmt->bindValue(':name_' . $tag, $tag);
      }
      return $stmt->execute();
   }

   // Delete a tag
   public function delete($id)
   {
      $query = "DELETE FROM tags WHERE id = :id";
      $stmt = $this->db->prepare($query);
      $stmt->bindParam(':id', $id);
      return $stmt->execute();
   }
}
