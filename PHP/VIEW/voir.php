<?php
$rows = Excel_row_Manager::getList();
echo '<div class="grid-container">';
echo '<div class="grid-item header-item">Column Excel</div>';
echo '<div class="grid-item header-item">To Table</div>';
echo '<div class="grid-item header-item">To Column</div>';
echo '<div class="grid-item header-item">Comment</div>';
foreach ($rows as $row) {
    // var_dump($row);

    echo '<div class="grid-item">';
    echo $row->getName();
    echo '</div>';

    echo '<div class="grid-item">';
    echo $row->getTo_table();
    echo '</div>';

    echo '<div class="grid-item">';
    echo $row->getTo_column();
    echo '</div>';

    echo '<div class="grid-item">';
    echo $row->getComment();
    echo '</div>';
}

echo '</div>';
echo'<a class=btn href="?page=tables">Modifier</a>';
echo'<a class=btn href="?page=export">Exporter</a>';
echo'<a class=btn href="?page=export&action=bot">Générer script</a>';
?>
