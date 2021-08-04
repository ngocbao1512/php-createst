<?php
    $data = file('options.txt') or die("can not read file");

    array_shift($data);

    $arrOptions = array();
    foreach($data as $key=>$value) {
        $tmp = explode("|",$value);
        $questionID = $tmp[0];
        $optionID =  $tmp[1];
        $answer = $tmp[2];
        $point = $tmp[3];
        $arrOptions[$questionID][$optionID]["option"] = $answer;
        $arrOptions[$questionID][$optionID]["point"] = $point;
    }

?>