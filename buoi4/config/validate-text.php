<?php

function clean($value) {
    $value = htmlspecialchars($value);
    $value = strip_tags($value);
    return $value;
}

?>
