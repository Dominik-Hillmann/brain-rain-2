<?php

/**
 * Get all the files that have the category `$category`.
 * 
 * @param string $category - The category of the files.
 * @param string $picDir - Path to the directory    
 */
function getCategoryFiles($category, $picDir) {
    $picInfos = getAllInfos($picDir);
    $filteredPicInfos = [];
    foreach ($picInfos as $picInfo) {
        if ($picInfo->category == $category) {
            array_push($filteredPicInfos, $picInfo);
        }
    }

    return $filteredPicInfos;
}

/**
 * @
 */
function getAllInfos($infoDir) {
    $picInfoFileNames = scandir(getcwd() . '\\'. $infoDir);
    $picInfos = [];
    foreach ($picInfoFileNames as $picInfoFileName) {
        if (strpos($picInfoFileName, '.json') !== false) {
            array_push(
                $picInfos,
                json_decode(file_get_contents($infoDir . '\\' . $picInfoFileName))
            );
        }
    }

    return $picInfos;
}


function getByName($name, $path) {
    $infoFileNames = scandir(getcwd() . '\\' . $path);
    foreach ($infoFileNames as $infoFileName) {
        $isJson = strpos($picInfoFileName, '.json') !== false;
        if (!$isJson) {
            continue;
        }

        $info = json_decode(file_get_contents(getcwd() . '\\' . $infoFileName));
        $correctName = $info->name == $name;

        if ($correctName) {
            return $info;
        }
    }

    return false;
}

// $categoryFiles = getCategoryFiles('Illustrationen', '../data/pic-info');
// foreach ($categoryFiles as $categoryFile) echo var_dump($categoryFile);
// foreach (scandir('../data/writing-info') as $file) echo '../data/writing-info' . '/' . $file . '<br>';
// echo $categoryFiles;
// foreach ( as $categoryFile) {
//     echo $category;
// }

?>