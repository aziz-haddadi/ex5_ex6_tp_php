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
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="students.xls"');
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Image</th><th>Name</th><th>Birthday</th><th>Section</th></tr>";

    foreach ($students as $student) {
        $section = Sections::getSection($student['section']);
        echo "<tr>";
        echo "<td>{$student['id']}</td>";
        echo "<td>{$student['image']}</td>";
        echo "<td>{$student['name']}</td>";
        echo "<td>{$student['birthday']}</td>";
        echo "<td>{$section['designation']}</td>";
        echo "</tr>";
    }

    echo "</table>";
    exit;
}

header("Location: ./studentList.php");
exit;
?>