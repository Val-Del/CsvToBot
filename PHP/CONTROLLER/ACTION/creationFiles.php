<?php
// var_dump($_POST['row']);
foreach ($_POST['row'] as $key) {
  $row = new Gen__Excel_row($key);
  // var_dump($row);
  Excel_row_Manager::update($row);
}

header('Location: index.php?page=voir');



















// $nom = Gen__Parameters::getProjectName();
// $dir = Gen__Parameters::getPathFramework();
// $dir =  $dir . '/' . $nom;
// // var_dump($_POST);
// deleteDirectory($dir);


// //create files
// mkdir($dir);
// $pathManager = $dir . '/MANAGER';
// $pathClass = $dir . '/CLASS';
// $pathGestion = $dir . '/GESTION';
// mkdir($pathGestion);
// mkdir($pathManager);
// mkdir($pathClass);
// $ts = Tables_Manager::selectAll();
// foreach ($ts as $key) {
//   foreach ($_POST as $kk => $vv) {
//     if ($kk == $key->getId_table()) {
//       if (array_key_exists('_generation', $vv)) {
//         $key->setGeneration('1');
//         createManager($key);
//         contentManager($key);

//         createClass($key);
//         contentClass($key);
//       }
//       if (array_key_exists('_back', $vv)) {
//         $key->setBack('1');

//         createGestion($key);
//         // contentClass($key);
//       }
    
//   // var_dump($key);


//       Tables_Manager::update($key);
//       // var_dump($key);
     
      
      
//     }
//   }
// }
// // clearBdd();