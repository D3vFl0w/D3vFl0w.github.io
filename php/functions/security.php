<?php

function securing($formData){
    $formData = trim($formData);
    $formData = stripslashes($formData);
    $formData = strip_tags($formData);
    return $formData;
}

?>