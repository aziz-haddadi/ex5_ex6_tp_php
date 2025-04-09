<?php

include_once "Sections.php";
session_start();

if (!isset($_SESSION['userRole'])) {
    header("Location: index.php");
    exit;
}

$sections = Sections::getAll();

if (count($sections) > 0) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="sections.csv"');
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    $output = fopen('php://output', 'w');
    fputcsv($output, ['ID', 'Designation', 'Description']);

    foreach ($sections as $section) {
        fputcsv($output, [$section['id'], $section['designation'], $section['description']]);
    }

    fclose($output);
    exit;
}

header("Location: ./sectionList.php");
exit;
?>