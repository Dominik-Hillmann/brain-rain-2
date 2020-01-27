<?php
function getCategoryFiles($category) {
    if ($category == 'Writing') {

    } else {
        $picInfoFiles = scandir('./data/pic-info/');
        $picInfos = [];

        for ($picInfoFiles as $picInfoFile) {
            array_push(
                $picInfos, 
                json_decode(file_get_contents('./data/pic-info/' . $picInfoFile))
            );
        }

        $filteredPicInfos = [];

        for ($picInfos as $picInfo) {
            if ($picInfo['category'] == $category) {
                array_push($filteredPicInfos, $picInfo);
            }
        }

        return $filteredPicInfos;
    }
}


?>