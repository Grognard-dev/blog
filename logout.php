<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
session_start();
unset($_SESSION['Pseudo']);
unset($_SESSION['ID']);
unset($_SESSION['is_admin']);
session_destroy();
header('Location: login.php'); 
}else{
    http_response_code(425);
    echo '425 error : method non accepter';
    
}