<?php
$rows = Excel_row_Manager::getList();
var_dump($_SESSION['parameters']);
if (isset($_GET['action']) && $_GET['action'] == 'bot') {
    $param = Parameters_Manager::getList(['*'],null,null,1,true);
    $file_excel = $param[0]['_file_excel'];
// var_dump($param);
// $file = $

    $path = $_SESSION['parameters']['pathFramework'] .'\\'. $file_excel;
    $pathScript = $_SESSION['parameters']['pathFramework'] . '/Script.php';
    $content = '<?php 
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "personnes";
// $file = "'.$path.'";
// $analyseFile ="'.$_SESSION['parameters']['pathFramework'].'\analyse.csv";
// $conn = new mysqli($servername, $username, $password, $dbname);
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
$data = csv_to_data($file);
$dataAnalyse = csv_to_data($analyseFile);
// var_dump($dataAnalyse);

$rows = array();
foreach ($data as $row) {
    $newRow = array();
    foreach ($row as $key => $value) {
        $newRow[$data[0][$key]] = $value;
    }
    $rows[] = $newRow;
}
$rows = array_slice($rows, 1);
var_dump($rows);

foreach ($rows as $key => $value) {
    # code...
}
    ';
    if (is_file($pathScript)) {
        unlink($pathScript);
    }
    file_put_contents($pathScript, $content, FILE_APPEND);
    // foreach ($rows as $row) {
    //    var_dump($row);
    // }
} else {
    $path = $_SESSION['parameters']['pathFramework'] . '\analyse.csv';

    $array = [];

    foreach ($rows as $object) {
        $array[] = [
            '_name' => $object->getName(),
            '_to_table' => $object->getTo_table(),
            '_to_column' => $object->getTo_column()
        ];
    }

    associative_array_to_csv($array, $path, ';', '"', '\\');
    
}
function associative_array_to_csv($array, $path, $delimiter = ';', $enclosure = '"', $escape_char = "\\")
    {
        $file = fopen($path, 'w');
        foreach ($array as $line) {
            fputcsv($file, $line, $delimiter, $enclosure, $escape_char);
        }
        fclose($file);
    }
header('Location: index.php?page=voir');
