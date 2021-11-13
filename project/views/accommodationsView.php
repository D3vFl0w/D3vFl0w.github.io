<?php
require_once('../controller/frontend.php');
sessionInit();
?>

<?php $title = 'Hébergements'; ?>

<?php ob_start(); ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>