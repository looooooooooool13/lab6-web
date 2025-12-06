<?php
$dbFile = 'movies.json';
$movies = [];

if (file_exists($dbFile)) {
    $jsonContent = file_get_contents($dbFile);
    $movies = json_decode($jsonContent, true) ?? [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['clear'])) {
        file_put_contents($dbFile, json_encode([]));
    } 
    elseif (!empty($_POST['titles'])) {
        $titles = $_POST['titles'];
        $contents = $_POST['contents'];
        
        for ($i = 0; $i < count($titles); $i++) {
            array_unshift($movies, [
                'title' => htmlspecialchars($titles[$i]),
                'content' => htmlspecialchars($contents[$i])
            ]);
        }
        file_put_contents($dbFile, json_encode($movies, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    header("Location: index2.html");
    exit;
}
?>
