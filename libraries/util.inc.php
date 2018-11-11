<?php
    function num2Roman($number) {
        // source: https://stackoverflow.com/questions/14994941/numbers-to-roman-numbers-with-php
        $map = [
            'M' => 1000, 
            'CM' => 900, 
            'D' => 500, 
            'CD' => 400, 
            'C' => 100, 
            'XC' => 90, 
            'L' => 50, 
            'XL' => 40, 
            'X' => 10, 
            'IX' => 9, 
            'V' => 5, 
            'IV' => 4, 
            'I' => 1
        ];
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if ($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }

    
    function getPicInfo($fileName) {
        return json_decode(file_get_contents(
            $_SERVER['DOCUMENT_ROOT'] . "/pic-info/" . $fileName, 
            "r"
        ));
    }

    function orderMedia($media) {
        // bucket sort by date
        $buckets = [];
        foreach ($media as $fileName) {
            array_push($buckets, []);
        }
        echo count($buckets);
    }
?>