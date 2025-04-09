<?php

include_once "Sections.php";
session_start();

$sections = Sections::getAll();

if (count($sections) > 0) {
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="sections.xls"');
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Designation</th><th>Description</th></tr>";

    foreach ($sections as $section) {
        echo "<tr>";
        echo "<td>{$section['id']}</td>";
        echo "<td>{$section['designation']}</td>";
        echo "<td>{$section['description']}</td>";
        echo "</tr>";
    }

    echo "</table>";
    exit;
}

header("Location: ./sectionList.php");
exit;
?>