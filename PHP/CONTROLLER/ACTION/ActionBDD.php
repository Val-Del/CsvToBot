<?php

//création parameter pour init la connection
$param = new Gen__Parameters($_POST);
$param->setFile_excel($_FILES['file_excel']['name']);
$_SESSION['parameters'] = $_POST;
$co = DBConnect::Connect();

//création + remplissage table 'parameters' dans la bdd
Parameters_Manager::dropTable($param);
Parameters_Manager::createTable($param);
Parameters_Manager::add($param);

//création + remplissage table 'tables' dans la bdd
$tables = Parameters_Manager::getInfo($param);
$primary_keys = Parameters_Manager::getPrimaryKeys($tables, $param->getNomBDD());
// var_dump($primary_keys);
$table = new Gen__Tables();
Tables_Manager::dropTable($table);
Tables_Manager::createTable($table);
// var_dump($_FILES);
// var_dump($_POST);

foreach ($tables as $row) {
    $table_name = $row['Tables_in_' . $param->getNomBDD()];
    $table = new Gen__Tables(['name' => $table_name]);
    // var_dump($table_name);
    if (array_key_exists($table_name, $primary_keys)) {
        $primary_key_array = $primary_keys[$table_name];
        if (array_key_exists(0, $primary_key_array)) {
            $primary_key = $primary_key_array[0];
            // var_dump($primary_key);
            $table->setPrimary_Key($primary_key);
        }
    }
    Tables_Manager::add($table);
}

if (isset($_FILES['file_excel']) && $_FILES['file_excel']['error'] == 0) {
$excelfile = $param->getPathFramework() . '\\' . $_FILES['file_excel']['name'];
}
//drop table + create dans la bdd
$row = new Gen__Excel_row();
Excel_row_Manager::dropTable($row);
Excel_row_Manager::createTable($row);

$data = csv_to_data($excelfile);
function csv_to_data($filename){
    $data = [];
    if ($file = fopen($filename, "r")) {
        $headers = fgetcsv($file, 5000, ";");
        $data = $headers;
       
        foreach ($headers as $header => $value) {
            $obj = new Gen__Excel_row();
            $obj->setName($value);
            // var_dump($obj) ;
            $add = Excel_row_Manager::add($obj);
            // var_dump($add);
        }
        fclose($file);
    }
    return $data;
}











//création + remplissage table 'columns' dans la bdd

// $tablefk = new Gen__Table_foreign_key();
// Table_foreign_key_Manager::dropTable($tablefk);
// Table_foreign_key_Manager::createTable($tablefk);

// $fk = new Gen__Foreign_key();
// Foreign_key_Manager::dropTable($fk);
// Foreign_key_Manager::createTable($fk);
    // createBaseFiles();


    // $table_name = $tables[0]['Tables_in_' . $test->getNomBDD()];

//     SELECT
//     CONSTRAINT_NAME
//   FROM
//     INFORMATION_SCHEMA.KEY_COLUMN_USAGE
//   WHERE
//     TABLE_NAME = 'personnes' 
  
  




//redirection sur liste tables pour leur gestion
header('Location: index.php?page=tables');
