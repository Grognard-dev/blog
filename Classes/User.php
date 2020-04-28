<?php 
require_once "../boot.php";
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
    
    public function __construct()
    {
    }
   
    
}