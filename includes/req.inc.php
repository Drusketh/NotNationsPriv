<?php
    $sql = "SELECT * FROM table WHERE ID = '$id'";
    $result = $db->query($sql);
    while ($row = $result->fetch_array()) {
        echo $row['something'];
    }
?>
