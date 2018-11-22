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
        return $num < 10 ? '0' . $num : (string) $num;
    }

    
    function getPicInfo($fileName) {
        // returns object with information about a picture from ../pic-info
        return json_decode(file_get_contents(
            $_SERVER['DOCUMENT_ROOT'] . '/pic-info/' . $fileName, 
            'r'
        ));
    }

    class InfoPrinter {
        private $printedIndex;

        function __construct() {
            $this->printedIndex = 0;
        }

        function getIndex() {
            return $this->printedIndex;
        }

        function printNext($picInfo, $maxNumInRow) {
            echo '<div class="pic-' . $maxNumInRow .' pic" ';
            echo 'style="background-image:url(\'./img/' . $picInfo->filename . '\')" ';
            echo 'onclick="currPic=document.querySelectorAll(\'.pic\')[' . $this->printedIndex . '];';
            echo 'blurBackground();unhidePic(\'./img/' . $picInfo->filename . '\');">';
            echo '<h1>' . $picInfo->name . '</h1>';
            echo '<p>' .
                prependZero($picInfo->day) . '.' .
                prependZero($picInfo->month) . '.' .
                $picInfo->year . '</p></div>';
            
            $this->printedIndex++;
        }
    }

    function bucketSort($arr) { }

    function orderPicInfo($allPicInfo) {
        // bucket sort by date, returns sorted array
        $originalLen = count($allPicInfo);
        $buckets = [];

        $years = $months = $days = [];
        foreach ($allPicInfo as $info) {
            array_push($years, $info->year);
            array_push($months, $info->month);
            array_push($days, $info->day);
        }
        // var_dump($years);
        asort($years);
        // var_dump($years);
        $yearBuckets = $monthBuckets = $dayBuckets = $indexBuckets = [];
        // echo count($yearBuckets);
        $lastElement = NULL;
        foreach ($years as $index => $year) {
            echo $index . "=>" . $year . "<br>";
            if (count($yearBuckets) == 0) {
                // completely new ==> push first array
                array_push($yearBuckets, [$year]);
                array_push($indexBuckets, [$index]);

            } else if ($year == $lastElement) {
                // if the element is the same as before, push it to array with same value
                array_push($yearBuckets[count($yearBuckets) - 1], $year);
                array_push($indexBuckets[count($indexBuckets) - 1], $index);

            } else {
                // otherwise 
                array_push($yearBuckets, [$year]);
                array_push($indexBuckets, [$index]);
            }            
            $lastElement = $year;
        }

        // create array where at a certain year's position there's no its corresponding month
        $monthBuckets = $yearBuckets;
        for ($i = 0; $i < count($indexBuckets); $i++) {
            // gebe den monthBuckets Monate gemäß Zuordnung 
            for ($j = 0; $j < count($indexBuckets[$i]); $j++) {
                $monthBuckets[$i][$j] = $months[$indexBuckets[$i][$j]];
            }






            // sortiere in einem Bucket die Monate und prüfe, ob gleiche Monate existieren            
            asort($monthBuckets[$i]);

            // hier Array


            $lastMonth = NULL; 

            foreach ($monthBuckets[$i] as $index => $month) {
                if ($month == $lastElement)

                $lastElement = $month;
            }

           
            # umfasse wieder mit einem Array
            
        }
        var_dump($yearBuckets);
        echo "<br>";
        var_dump($monthBuckets);

        # ordne nach Jahren, mit einem 
            # Array in Jahren und eine
        // var_dump($yearBuckets); echo "<br>"; print_r($indexBuckets);
       
    }
?>