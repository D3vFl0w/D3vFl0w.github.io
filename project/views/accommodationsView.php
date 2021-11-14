<?php
require_once('/wamp64/www/D3vFl0w.github.io/project/controller/frontend.php');
sessionInit();
?>

<?php $title = 'Hébergements'; ?>

<?php ob_start(); ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>