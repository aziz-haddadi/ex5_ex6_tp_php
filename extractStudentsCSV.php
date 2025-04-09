<?php

include_once "Students.php";
include_once "Sections.php";
session_start();

if (isset($_GET['idSection'])) {
    $students = Students::getStudentBySection($_GET['idSection']);
} else if (isset($_GET['filter'])) {
    $students = Students::getStudentsByNameFilter($_GET['filter']);
} else {
    $students = Students::getAll();
}

if (count($students) > 0) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="students.csv"');
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    $output = fopen('php://output', 'w');
    fputcsv($output, ['ID', 'Image', 'Name', 'Birthday', 'Section']);

    foreach ($students as $student) {
        $section = Sections::getSection($student['section']);
        fputcsv($output, [
            $student['id'],
            $student['image'],
            $student['name'],
            $student['birthday'],
            $section['designation']
        ]);
    }

    fclose($output);
    exit;
}

header("Location: ./studentList.php");
exit;
?>