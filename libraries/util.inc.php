<?php
###########################
#### Utility Functions ####
###########################

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
        array_push(
            $spans, 
            ($lastLetterEmpty ? ('<span>' . ' ') : '<span>') . $letter . '</span>'
        );
        $lastLetterEmpty = $letter == ' ';
    }        
    return implode($spans);
}

#########################
#### Classes - Infos ####
#########################

abstract class Info {
    // 

    protected function getJSON($fileName, $folderName) {
        // 
        return json_decode(file_get_contents(
            $_SERVER['DOCUMENT_ROOT'] . '/' . $folderName . '/' . $fileName,
            'r'
        ));
    }

    protected function prependZero($num) {
        // if number is smaller than 10, a zero will be prepended and returned as a string
        $numInt = (int) $num;

        if ($numInt < 10) {
            return "0" . ((string) $numInt);
        } else {
            return (string) ((int) $num);
        }
    }
}


abstract class ContentInfo extends Info {
    // properties that the pics and texts have in common
    protected $name;
    protected $day;
    protected $month;
    protected $year;
    protected $secret;
    protected $tags;
    protected $category;

    public function __construct($json) {
        $this->secret = $json->secret;
        $this->name = $json->name;
        $this->category = $json->category;
        $this->year = $json->year;
        $this->month = $json->month;
        $this->day = $json->day;
        // Tags will be defined in child classes because it is dependend on media type which MySQL table to use.
    }

    public function isSecret() {
        // bool whether this content is allowed on the public parts if the websites
        return $this->secret;
    }

    public function getName() {
        return $this->name;
    }

    public function getUNIXTime() {
        // UNIX time of date of creation of content
        return strtotime($this->day . '.' . $this->month . '.' . $this->year);
    }

    protected function getDate() {
        return $this->prependZero($this->day) . '.' . $this->prependZero($this->month) . '.' . $this->year;
    }

    abstract function print($printedIndex, $maxNumInRow); // prints presentation on the website

}


/**
 * @property
 */
class PicInfo extends ContentInfo { 
    private $filename;
    private $description;
    private $instagram;
    private $twitter;

    public function __construct($json) {
        parent::__construct($json);

        $this->filename = $json->filename;
        $this->description = $json->description;
        $this->instagram = $json->instagram;
        $this->twitter = $json->twitter;
        $this->tags = $json->tags;
    }

    public function print($printedIndex, $maxNumInRow) {
        // print all pictures whose information is contained in object and adds JS to view the image
        echo '<div class="pic-' . $maxNumInRow .' pic" '; // sorrounding div
        echo 'style="background-image:url(\'./img/' . $this->filename . '\')" ';
        // JS to be executed when clicked
        echo 'onclick="currPic=document.querySelectorAll(\'.pic\')[' . $printedIndex . '];';
        echo 'blurBackground([document.querySelector(\'#thin-wave\'),';
        echo 'document.querySelector(\'.thin-lines\')]);';
        echo 'unhidePic(\'./img/' . $this->filename . '\');';
        echo 'scrollToMainPic();">';
        // title and date, gets ordered later on
        echo '<div class="name-date-wrapper">';
        echo '<h1>' . $this->name . '</h1>';
        echo '<p>' . $this->getDate() . '</p></div></div>';
    }

    public function printHiddenDescription() {
        // prints the hidden description of this picture in hidden form for JS to fetch it
        echo '<div class="hidden-pic-info">';
        echo '<h1>'. $this->name .'</h1>';
        echo '<p>'. $this->description .'</p></div>';
    }
}


class WritingInfo extends ContentInfo {

    private $text;
    
    public function __construct($json) {
        parent::__construct($json);
        $this->text = $json->text;
        $this->tags = $json->tags;
    }

    public function print($printedIndex, $maxNumInRow) {
        //
        $date = $this->getDate();

        echo '<div class="text-' . $maxNumInRow . '" ';

        echo 'onclick="window.open(\'./read-text.php?';
        echo 'date=' . urlencode($date) . '&';
        echo 'text=' . urlencode($this->text) . '&';
        echo 'title=' . urlencode($this->name);
        echo '\', \'_blank\', \'\');return false;">';

        echo '<div class="text-background">';
        echo '<div class="background-background">&nbsp;</div>';
        echo $this->text . '</div>';
        echo '<div class="name-date-wrapper">';
        echo '<h1>' . $this->name . '</h1>';
        echo '<p>' . $date . '</p></div></div>';
    }
}


class UserInfo extends Info {
    private $user;
    private $pw;
    private $pics;
    private $writings;
    
    public function __construct($json) {
        $this->user = $json->user;
        $this->pw = $json->pw;
        $this->pics = $json->pics;
        $this->writings = $json->writings;
    }

    public function check($testPassword, $testUsername) {
        $passwordCorrect = password_verify($testPassword, $this->pw);
        $userNameCorrect = $testUsername == $this->user;
        return $userNameCorrect && $passwordCorrect;
    }

    public function getPicInfos() {
        $wantedPicInfos = [];
        foreach ($this->pics as $picFileName) {
            $json = getByFileName($picFileName, 'data/pic-info');
            array_push($wantedPicInfos, new PicInfo($json));
        }
        
        return $wantedPicInfos;
    }
    
    public function getWritingInfos() {            
        $wantedWritInfos = [];
        foreach ($this->writings as $writName) {
            $json = getByName($writName, 'data/writing-info');
            array_push($wantedWritInfos, new WritingInfo($json));
        }
        
        return $wantedWritInfos;
    }
}

################################
#### Classes - InfoPrinters ####
################################

abstract class InfoPrinter {
    //
    protected $printedIndex;
    protected $infoArr;

    protected function getChunkedInfo() {
        return array_chunk($this->infoArr, 3);
    }

    protected function getIndex() {
        return $this->printedIndex;
    }

    protected function orderInfo($allInfo) {
        // creates array ordered by date, independet of type of info 
        $unixTimes = [];
        foreach ($allInfo as $info) {
            array_push(
                $unixTimes, 
                $info->getUNIXTime()
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
    
    public function __construct($infoArr) {
        $this->printedIndex = 0;
        $this->infoArr = $this->orderInfo($infoArr);
    }

    public function printNext($picInfo, $maxNumInRow) {
        // 
        $picInfo->print($this->printedIndex, $maxNumInRow);            
        $this->printedIndex++;
    }

    public function printContainedInfo() {
        //
        foreach ($this->getChunkedInfo() as $subInfo) {
            echo '<div class="row">';
            for ($i = 0; $i < count($subInfo); $i++) {
                $this->printNext($subInfo[$i], count($subInfo));
            }                
            echo '</div>';
        } 
    } // printContainedInfo

    public function printHiddenDescriptions() {
        // echo descriptions and names in hidden div so that the JS functions can use it to change descriptions when displayed
        echo '<div id="pic-texts" style="display:none;">';
        foreach ($this->getChunkedInfo() as $subPicInfo) {
            foreach ($subPicInfo as $picInfo) {
                $picInfo->printHiddenDescription();
            }                    
        }
        echo '</div>';
    }

} // AnyPicInfoPrinter


class WritingsInfoPrinter extends InfoPrinter {
    //

    public function __construct($infoArr) {
        $this->printedIndex = 0;
        $this->infoArr = $this->orderInfo($infoArr);
    }

    public function printNext($info, $maxNumInRow) {
        //
        $info->print($this->printedIndex, $maxNumInRow);          
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
