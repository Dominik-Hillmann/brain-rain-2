<?php
    function num2Roman($number) {
        // source: https://stackoverflow.com/questions/14994941/numbers-to-roman-numbers-with-php
        // returns $number in roman numerals
        $map = [
            'M'  => 1000, 
            'CM' => 900, 
            'D'  => 500, 
            'CD' => 400, 
            'C'  => 100, 
            'XC' => 90, 
            'L'  => 50, 
            'XL' => 40, 
            'X'  => 10, 
            'IX' => 9, 
            'V'  => 5, 
            'IV' => 4, 
            'I'  => 1
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

    function strToSpans($str) {
        // str to <span>s</span><span>t</span><span>r</span>
        $spans = [];
        $lastLetterEmpty = FALSE;
        foreach (str_split($str) as $letter) {
            if ($letter != ' ') {
                array_push(
                    $spans, 
                    ($lastLetterEmpty ? '<span> ' : '<span>') . $letter . '</span>'
                );
            }

            $lastLetterEmpty = $letter == ' ';
            echo $lastLetterEmpty;
        }
        
        return implode($spans);
    }

    
    function getInfo($fileName, $folderName) {
        // returns object with information about a picture from ../pic-info
        return json_decode(file_get_contents(
            $_SERVER['DOCUMENT_ROOT'] . '/' . $folderName . '/' . $fileName, 
            'r'
        ));
    }

    abstract class InfoPrinter {
        //
        protected $printedIndex;
        protected $infoArr;

        function getChunkedInfo() {
            return array_chunk($this->infoArr, 3);
        }

        protected function getIndex() {
            return $this->printedIndex;
        }

        protected function prependZero($num) {
            // if number is smaller than 10, a zero will be prepended
            return $num < 10 ? '0' . $num : (string) $num;
        }

        protected function orderInfo($allInfo) {
            // creates array ordered by date, independet of type of info
            $unixTimes = [];
            foreach ($allInfo as $info) {
                array_push(
                    $unixTimes, 
                    strtotime($info->day . "." . $info->month . "." . $info->year)
                );
            }
    
            asort($unixTimes);
            
            $reInfo = [];
            foreach ($unixTimes as $index => $time) {
                array_push($reInfo, $allInfo[$index]);
            }
    
            return array_reverse($reInfo);
        }

        // has to be implemented differently dependent on whether pics or text are contained
        abstract function printNext($picInfo, $maxNumInRow);
        
        abstract function printContainedInfo();
    }

    class PicInfoPrinter extends InfoPrinter {
        //
        
        function __construct($infoArr) {
            $this->printedIndex = 0;
            $this->infoArr = $this->orderInfo($infoArr);
        }

        function printNext($picInfo, $maxNumInRow) {
            //
            echo '<div class="pic-' . $maxNumInRow .' pic" '; // sorrounding div
            echo 'style="background-image:url(\'./img/' . $picInfo->filename . '\')" ';
            // JS to be executed when clicked
            echo 'onclick="currPic=document.querySelectorAll(\'.pic\')[' . $this->printedIndex . '];';
            echo 'blurBackground();unhidePic(\'./img/' . $picInfo->filename . '\');';
            echo 'scrollToMainPic();">';
            // title and date, gets ordered later on
            echo '<h1>' . $picInfo->name . '</h1>';
            echo '<p>' .
                $this->prependZero($picInfo->day) . '.' .
                $this->prependZero($picInfo->month) . '.' .
                $picInfo->year . '</p></div>';
            
            $this->printedIndex++;
        }

        function printContainedInfo() {
            //
            $chunkedInfo = array_chunk($this->infoArr, 3);
                
            foreach ($chunkedInfo as $subInfo) {
                echo '<div class="row">';
                for ($i = 0; $i < count($subInfo); $i++) {
                    $this->printNext(
                        $subInfo[$i], 
                        count($subInfo)
                    );
                }                
                echo '</div>';
            } 
        } // printContainedInfo
    } // AnyPicInfoPrinter
    
    class WritingsInfoPrinter extends InfoPrinter {
        //

        function __construct($infoArr) {
            $this->printedIndex = 0;
            $this->infoArr = $this->orderInfo($infoArr);
        }

        function printNext($info, $maxNumInRow) {
            //

            $date = $this->prependZero($info->day) . '.' . 
                $this->prependZero($info->month) . '.' . 
                $info->year;

            echo '<div class="text-' . $maxNumInRow . '" ';

            echo 'onclick="window.open(\'./read-text.php?';
            echo 'date=' . urlencode($date) . '&';
            echo 'text=' . urlencode($info->text) . '&';
            echo 'title=' . urlencode($info->name);
            echo '\', \'_blank\', \'\');return false;">';

            echo '<div class="text-background">';
            echo '<div class="background-background">&nbsp;</div>';
            echo $info->text . '</div>';
            echo '<h1>' . $info->name . '</h1>';
            echo '<p>' . $date . '</p></div>';
            
            $this->printedIndex++;
        }

        public function printContainedInfo() {
            // 
            $chunkedInfo = array_chunk($this->infoArr, 3);
                                   
            foreach ($chunkedInfo as $infoRow) {
                $numElements = count($infoRow);

                echo '<div class="row">';
                for ($i = 0; $i < $numElements; $i++) {
                    $this->printNext(
                        $infoRow[$i],
                        $numElements
                    );
                }
                echo '</div>';
            }
        } // printContainedInfo
    } // WritingsInfoPrinter
?>
