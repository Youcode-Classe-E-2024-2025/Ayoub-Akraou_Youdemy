<?php

class User
{
   // Propriétés
   protected $id;
   protected $name;
   protected $email;
   protected $password;
   protected $role;
   protected $is_active;
   protected $is_validated;

   // Constructeur
   public function __construct($name = '', $email = '', $password = '', $role = 2, $is_active = true, $is_validated = true)
   {
      $this->name = $name;
      $this->email = $email;
      $this->password = $password;
      $this->role = $role;
      $this->is_active = $is_active;
      $this->is_validated = $is_validated;
   }

   // Getters
   public function getId()
   {
      return $this->id;
   }

   public function getName()
   {
      return $this->name;
   }

   public function getEmail()
   {
      return $this->email;
   }

   public function getRole()
   {
      return $this->role;
   }

   public function getStatus()
   {
      return $this->status;
   }

   // Setters et Getters
   public function setName($name)
   {
      $this->name = $name;
   }

   public function setEmail($email)
   {
      $this->email = $email;
   }

   public function setPassword($password)
   {
      $this->password = password_hash($password, PASSWORD_BCRYPT);
   }

   public function setStatus($status)
   {
      $this->status = $status;
   }

   // Méthodes       


   public function register($db)
   {
      $query = "INSERT INTO users (name, email, password, role_id, is_active, is_validated) VALUES (?, ?, ?, ?, ?, ?)";

      $roles = [1 => "admin", 2 => "student", 3 => "teacher"];
      if ($roles[$this->role] == 'teacher') $this->is_validated = 0;
      $params = [
         $this->name,
         $this->email,
         $this->password,
         $this->role,
         $this->is_active,
         $this->is_validated
      ];

      return $db->query($query, $params);
   }

   public static function login($db, $email, $password)
   {
      $query = "SELECT * FROM users WHERE email = ?";
      $user = $db->selectOne($query, [$email]);

      if ($user && password_verify($password, $user['password'])) {
         return $user;
      }

      return null;
   }

   public static function findByEmail($db, $email)
   {
      $query = "SELECT * FROM users WHERE email = ?";
      $user = $db->selectOne($query, [$email]);
      return $user ? $user : null;
   }


   public function checkPassword($password)
   {
      return password_verify($password, $this->password);
   }

   static function logout()
   {
      session_unset();
      session_destroy();
   }

   public function update($db)
   {
      $query = "UPDATE users SET name = ?, email = ?, password = ?, role_id = ?, is_active = ? WHERE id = ?";

      // Récupérer l'ID du rôle à partir du nom du rôle
      $roleId = $this->getRoleIdByName($db, $this->role);

      $params = [
         $this->name,
         $this->email,
         $this->password,
         $roleId,
         $this->id
      ];

      return $db->query($query, $params);
   }

   public static function delete($db, $id)
   {
      $query = "DELETE FROM users WHERE id = ?";
      return $db->query($query, [$id]);
   }


   private function getRoleIdByName($db, $roleName)
   {
      $query = "SELECT id FROM roles WHERE name = ?";
      $role = $db->selectOne($query, [$roleName]);

      return $role ? $role['id'] : null;
   }

    public static function count($db)
    {
        $query = "SELECT COUNT(*) as total FROM users";
        $result = $db->selectOne($query);
        return $result['total'];
    }

    
    public static function getAll($db)
    {
        $query = "SELECT * FROM users";
        return $db->select($query);
    }

}
