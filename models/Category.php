<?php
class Category
{
   private $id;
   private $name;
   private $description;
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

   public function setDescription($description)
   {
      $this->description = $description;
   }

   public function getDescription()
   {
      return $this->description;
   }

   // Create a new category
   public function create()
   {
      $query = "INSERT INTO categories (name, description) VALUES (:name, :description)";
      $stmt = $this->db->prepare($query);
      $stmt->bindParam(':name', $this->name);
      $stmt->bindParam(':description', $this->description);
      return $stmt->execute();
   }

   // Update an existing category
   public function update($id)
   {
      $query = "UPDATE categories SET name = :name, description = :description WHERE id = :id";
      $stmt = $this->db->prepare($query);
      $stmt->bindParam(':name', $this->name);
      $stmt->bindParam(':description', $this->description);
      $stmt->bindParam(':id', $id);
      return $stmt->execute();
   }

   // Delete a category
   public function delete($id)
   {
      $query = "DELETE FROM categories WHERE id = :id";
      $stmt = $this->db->prepare($query);
      $stmt->bindParam(':id', $id);
      return $stmt->execute();
   }
}
