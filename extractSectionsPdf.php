<?php

include_once "Sections.php";
session_start();

$sections = Sections::getAll();

if (count($sections) > 0) {
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment;filename="sections.pdf"');
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    $pdfContent = "%PDF-1.4\n";
    $pdfContent .= "1 0 obj << /Type /Catalog /Pages 2 0 R >> endobj\n";
    $pdfContent .= "2 0 obj << /Type /Pages /Kids [3 0 R] /Count 1 >> endobj\n";
    $pdfContent .= "3 0 obj << /Type /Page /Parent 2 0 R /MediaBox [0 0 612 792] /Contents 4 0 R >> endobj\n";
    $pdfContent .= "4 0 obj << /Length 5 0 R >> stream\n";
    $pdfContent .= "BT /F1 12 Tf 72 720 Td (Sections List) Tj ET\n";

    $yPosition = 700;
    foreach ($sections as $section) {
        $line = "{$section['id']} - {$section['designation']} - {$section['description']}";
        $pdfContent .= "BT /F1 10 Tf 72 {$yPosition} Td ({$line}) Tj ET\n";
        $yPosition -= 20;
    }

    $pdfContent .= "endstream endobj\n";
    $pdfContent .= "5 0 obj 123 endobj\n";
    $pdfContent .= "xref\n0 6\n0000000000 65535 f\n0000000010 00000 n\n0000000079 00000 n\n";
    $pdfContent .= "0000000178 00000 n\n0000000277 00000 n\n0000000376 00000 n\n";
    $pdfContent .= "trailer << /Root 1 0 R /Size 6 >>\nstartxref\n476\n%%EOF";

    echo $pdfContent;
    exit;
}

header("Location: ./sectionList.php");
exit;
?>