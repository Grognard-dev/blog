<?php 
require_once "boot.php";
class Commentaire
{
   
    public $id_utilisateur;
    public $id_article;
    public $id_commentaire;
    public $texte;
    public $modere = 0;
    public $date;
    
    public function __construct()
    {
    }
   
    
}