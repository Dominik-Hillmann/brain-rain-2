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

        foreach ($yearBuckets as $yearBucket) {
            if (count($yearBucket) > 1) {

            }
        }
        var_dump($yearBuckets); echo "<br>"; print_r($indexBuckets);
        // ich sortiere zunächst nach Jahren
        # wenn es in den Jahren Elemente des gleichen Jahres gibt, dann sortiere ich nach

        // $yearBuckets = [];
        // $indexBuckets = [];
        // for ($i = 0; $i < count($years); $i++) {
        //     $curMin = min($years);
        //     $curMinIndex = array_search($curMin, $years);
        //     $years[$curMinIndex] = 99999999;

        //     if (count($yearBuckets) != 0) {
        //         $pushed = FALSE;
        //         foreach ($yearBuckets as $bucket) {
        //             if ($bucket[0] == $curMin) {
                        
        //                 $pushed = TRUE;
        //             }
        //         }
        //     } else {
        //         array_push($yearBuckets, [$curMin]);
        //         array_push($indexBuckets, [$curMinIndex]);
        //     }
        #  }

        # durch alle Elemente
        # wenn min neu, dann neuer Arr mit Ele daran
        # wenn nicht neu, dann dran
        // echo count($buckets);
    }
?>