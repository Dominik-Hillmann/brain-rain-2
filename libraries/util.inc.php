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

    function prependZero($num) {
        // if number is smaller than 10, zero will prepended
        return $num < 10 ? 0 . $num : (string) $num;
    }

    
    function getPicInfo($fileName) {
        // returns object with information about a picture from ../pic-info
        return json_decode(file_get_contents(
            $_SERVER['DOCUMENT_ROOT'] . '/pic-info/' . $fileName, 
            'r'
        ));
    }

    function printInfo($picInfo, $numPicInRow, $maxNumInRow) {
        //
        echo '<div class="pic-' . $maxNumInRow .' pic" ';
        echo 'style="background-image:url(\'./img/' . $picInfo->filename . '\')" ';
        echo 'onclick="currPic=document.querySelectorAll(\'.pic\')[' . $numPicInRow . '];';
        echo 'blurBackground();unhidePic(\'./img/' . $picInfo->filename . '\');">';
        echo '<h1>' . $picInfo->name . '</h1>';
        echo '<p>' .
            prependZero($picInfo->day) . '.' .
            prependZero($picInfo->month) . '.' .
            $picInfo->year . '</p></div>';
    }

    function orderPicInfo($allPicInfo) {
        // bucket sort by date, returns sorted array
        $buckets = [];
        foreach ($allPicInfo as $info) {
            array_push($buckets, []);
            echo $info->year . ' ';
        }
        // echo count($buckets);
    }
?>