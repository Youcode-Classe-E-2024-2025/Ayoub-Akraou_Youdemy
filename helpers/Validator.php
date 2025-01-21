<?php
class Validator
{

   public static function notEmpty($value)
   {
      return !empty(trim($value));
   }

   public static function minLength($value, $min)
   {
      return strlen($value) >= $min;
   }

   public static function maxLength($value, $max)
   {
      return strlen($value) <= $max;
   }

   public static function fullname($fullname)
   {
      // Regex pour valider "nom prenom" en majuscules ou minuscules
      $regex = "/^[a-zA-Z]+ [a-zA-Z]+$/";
      return preg_match($regex, $fullname) === 1;
   }

   public static function email($value)
   {
      $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
      return preg_match($pattern, $value) === 1;
   }

   public static function strongPassword($value)
   {
      // Vérifie au moins une lettre, un chiffre et une longueur de 8 caractères
      return preg_match('/^(?=.*[A-Za-z])(?=.*\d).{8,}$/', $value) === 1;
   }

   public static function regex($value, $pattern)
   {
      return preg_match($pattern, $value);
   }

   public static function verifyPassword($password, $hashedPassword)
   {
      return password_verify($password, $hashedPassword);
   }

   public static function role($role)
   {
      $validRoles = ['admin', 'teacher', 'student'];
      return in_array(strtolower($role), $validRoles);
   }

   public static function status($status)
   {
      $validStatuses = ['active', 'pending', 'suspended'];
      return in_array(strtolower($status), $validStatuses);
   }

   public static function title($title)
   {
      return self::minLength($title, 3) && self::maxLength($title, 255);
   }

   public static function description($description)
   {
      return self::minLength($description, 10) && self::maxLength($description, 1000);
   }

   public static function price($price)
   {
      return is_numeric($price) && $price >= 0;
   }

   public static function tags($tags)
   {
      if (!is_array($tags)) return false;
      foreach ($tags as $tag) {
         if (!self::minLength($tag, 2) || !self::maxLength($tag, 50)) {
            return false;
         }
      }
      return true;
   }

   public static function url($url)
   {
      return filter_var($url, FILTER_VALIDATE_URL) !== false;
   }

   public static function date($date)
   {
      return strtotime($date) !== false;
   }

   public static function id($id)
   {
      return is_numeric($id) && $id > 0;
   }
}
