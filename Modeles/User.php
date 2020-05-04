<?php 
require_once "boot.php";
class User
{
   
    public $id_utilisateur;
    public $nom;
    public $prenom;
    public $mdp;
    public $pseudo;
    public $email;
    public $admin;
    public $token;
    public $id_grade = 1;
    
    public function __construct()
    {
    }
   
    
}