<?php
$tables = Tables_Manager::selectAll();
$columns = Excel_row_Manager::getList();

// var_dump($columns);
// var_dump($tables);
// var_dump($tables);
echo '<form method="POST" action="?page=creationFiles">';
echo '
<div class="grid-container ">
<div class="grid-item header-item">Column name</div>
<div class="grid-item header-item">Table</div>
<div class="grid-item header-item">Column</div>';
$i = 0;
foreach ($columns as $column) {
     if (substr($column->getName(), 0, 5) != "gen__") {
          echo '<div class="grid-item">';
          echo '<input type="text" name="row[' . $i . '][_name]" value="' . $column->getName() . '" >';
          echo '</div>';
          echo '<input type="hidden" name="row[' . $i . '][_id_excel_row]" value="' . $column->getId_excel_row() . '">';
          echo '<div class="grid-item">';

          echo '<select class="_to_table" name="row[' . $i . '][_to_table]">';
          
echo '<option data-table="none" value="" selected></option>';
          foreach ($tables as $table => $value) {
               if (substr($value->getName(), 0, 5) != "gen__") {
                    $selected = ($value->getName() == $column->getTo_Table()) ? 'selected' : '';
                    echo '<option value="' . $value->getName() . '" data-table="' . $value->getName() . '" ' . $selected . '>' . $value->getName() . '</option>';
               }
          }
          echo '</select>';


          echo '</div>';

          echo '<div class="grid-item">';
          echo '<select name="row[' . $i . '][_to_column]">';
          
echo '<option data-table="none" value="" selected></option>';
          foreach ($tables as $table => $value) {
               if (substr($value->getName(), 0, 5) != "gen__") {
                    $columns = DAO::select(['*'], $value->getName(), null, null, 1, true);
                    foreach ($columns as $col) {
                         foreach ($col as $key => $va) {
                              // var_dump($column->getTo_column());
                              // // var_dump($value);
                              // echo '<option value="' . $key . '" data-table="' . $value->getName() . '">' . $key . '</option>';

                              $selected = ($key == $column->getTo_Column()? 'selected' : '');
                              echo '<option value="' . $key . '" data-table="' . $value->getName() . '" ' . $selected . '>' . $key . '</option>';
                         }
                    }
               }
          }
          echo '</select>';
          echo '</div>';

          $i++;
     }
}


echo '</div>';


echo '<br><button class=btn type=submit>VALIDER</button>';
echo '</form>';






// foreach ($tables as $table) {
//      // if ($table->getName() != "gen__tables" && $table->getName() != "gen__parameters" && $table->getName() != "gen__foreign_key"  && $table->getName() != "gen__table_foreign_key") {
//      if (substr($table->getName(), 0, 5 ) != "gen__") {
//           echo '<div class="grid-item">';
//           echo  ucFirst($table->getName()) ;
//           echo '</div>';

//           echo '<div class="grid-item">';
//           echo '<input type="checkbox" name="'.$table->getId_table().'[_generation]">';
//           echo '</div>';

//           echo '<div class="grid-item">';
//           echo '<input type="checkbox" name="'.$table->getId_table().'[_back]">';
//           echo '</div>';
//      }
// }