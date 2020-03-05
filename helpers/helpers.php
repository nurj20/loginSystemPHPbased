<?php
function redirect($message){
    header('Location: ../index.php?status='.$message);
    exit();
}