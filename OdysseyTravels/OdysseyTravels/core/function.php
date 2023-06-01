<?php
function  clear($input){

    $input=str_replace(' ','',$input);
    $input=trim($input);
    $input=htmlspecialchars($input,ENT_QUOTES,'UTF-8');
    $input=strip_tags($input);

    return $input;


}



?>