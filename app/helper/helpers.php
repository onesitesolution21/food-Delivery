<?php
function filterField($string) {
    return preg_replace('/[,\/]/', '', $string);
} 