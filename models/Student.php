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

}