<?php
require_once ('../admin/DBFun.php');
$db = new DBFun();

//pobranie danych
$first_name = $_POST['formFirstName'];
$last_name = $_POST['formLastName'];
$email = $_POST['formEmail'];
$academy = $_POST['formacademyName'];
$study_level = $_POST['formLevel'];
$subjects = $_POST['formSubjects'];


$query = $db->insert('participants', '', 'first_name, last_name, email, academy, study_level, subjects', "$first_name, $last_name, $email, $academy, $study_level, $subjects");

print_r($query);

//Test
// print_r($first_name);
// print_r($last_name);
// print_r($email);
// print_r($academy);
// print_r($study_level);
// print_r($subjects);


// Działa, przetestowane
// ToDo: Ogarnać subjects