<?php

function get_str_difs($str1, $str2) {
    $first = explode(" ", $str1);
    $second = explode(" ", $str2);
    $arrDif1 = array_diff($first,$second);
    $arrDif2 = array_diff($second,$first);

    $old = '';
    $new = '';
    foreach($first as $word) {
        if(in_array($word,$arrDif1)) {
            $old .= "<del style='background-color:#ffcccc'>" . $word . "</del> ";
            continue;
        }
        $old .= $word . " ";     
    }
    foreach($second as $word) {
        if(in_array($word,$arrDif2)) {
            $new .= "<ins style='background-color:#ccffcc'>" . $word . "</ins> ";
            continue;
        }
        $new .= $word . " ";   
    }
    return array('old' => $old, 'new' => $new);
}
$str1 = "Olá, cá estou eu no Stack Overflow PT ";
$str2 = "Hey, cá estou eu no Stack Exchange, SO PT show";
$difs = get_str_difs($str1, $str2);
echo '<p>Str1:<b>' .$str1. '</b></p>';
echo '<p>Str2:<b>' .$str2. '</b></p>';
echo '<p><b>Difference:</b></p>';
echo '<p>' .$difs['old']. '</p>';
echo '<p>' .$difs['new']. '</p>';

?>