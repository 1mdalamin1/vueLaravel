<?php

// app/Helpers/HelperFunctions.php

if (!function_exists('get_name_by_ids_comma_separate_string')) {
    function get_name_by_ids_comma_separate_string($keyId_valueColumnName_Array, $idCommaSeparateString){
        $idClassName = $keyId_valueColumnName_Array;
        $cIds = explode(',', $idCommaSeparateString);

        $classNames = [];
        foreach ($cIds as $id) {
            if (isset($idClassName[$id])) {
                $classNames[] = $idClassName[$id];
            }
        }
        $result = implode(', ', $classNames);
        return $result;
    }
}



