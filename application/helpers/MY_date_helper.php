<?php
    function get_date($time, $full_time = true){
        $format = '%d-%m-%Y';
        if($full_time){
            $format = $format.' - %H:%i:%s';
        }
        $date = mdate($format, $time);
        return $date;
    }
?>