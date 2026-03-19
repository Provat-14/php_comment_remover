<?php
function removeComments($content, $isBlade = false) {
    $standardPattern = '/(\/\*[\s\S]*?\*\/)|((?<![:"\'\/])\/\/.*)/';
    
    if ($isBlade) {
        $bladePattern = '/\{\{--[\s\S]*?--\}\}/';
        $content = preg_replace($bladePattern, '', $content);
    }

    return preg_replace($standardPattern, '', $content);
}

function processPath($targetPath) {
    if (!file_exists($targetPath)) {
        die("worng path");
    }
    if (is_file($targetPath)) {
        cleanFile($targetPath);
    }else {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($targetPath));
        foreach ($files as $file) {
            if ($file->isFile()) {
                cleanFile($file->getRealPath());
            }
        }
    }
    echo "successfully done";
}

function cleanFile($filePath) {
    $extension = pathinfo($filePath, PATHINFO_EXTENSION);
    $fileName = basename($filePath);
    $isBlade = (str_contains($fileName, '.blade.php'));

    $allowedExtensions = ['php', 'js', 'jsx', 'ts', 'tsx', 'vue'];

    if (in_array($extension, $allowedExtensions) || $isBlade) {
        $content = file_get_contents($filePath);
        $cleaned = removeComments($content, $isBlade);
        file_put_contents($filePath, $cleaned);
        echo "Cleaned: $filePath\n";
    }
}

// add your folder or file.ext name
$inputPath = './test.php'; 
processPath($inputPath);