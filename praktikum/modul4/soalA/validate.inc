<?php
function validateName($name) {
    if (preg_match("/^[a-zA-Z]+$/", $name)) {
        return true; 
    } else {
        return false; 
    }
}
?>
