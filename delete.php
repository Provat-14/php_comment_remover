<?php
$target_dir = './your_path'; 

function list_files($dirname, &$file_list) {
    if (is_dir($dirname)) {
        $dir_handle = opendir($dirname);
        while ($file = readdir($dir_handle)) {
            if ($file != "." && $file != "..") {
                $path = $dirname . "/" . $file;
                if (is_dir($path)) {
                    $file_list[] = "[Folder] $path";
                    list_files($path, $file_list);
                } else {
                    $file_list[] = "[File]   $path";
                }
            }
        }
        closedir($dir_handle);
    }
}

function delete_directory($dirname) {
    if (is_dir($dirname)) {
        $dir_handle = opendir($dirname);
        while ($file = readdir($dir_handle)) {
            if ($file != "." && $file != "..") {
                $path = $dirname . "/" . $file;
                if (!is_dir($path)) {
                    chmod($path, 0777);
                    unlink($path);
                } else {
                    delete_directory($path);
                }
            }
        }
        closedir($dir_handle);
        chmod($dirname, 0777);
        return rmdir($dirname);
    }
    return false;
}


$files_to_delete = [];
list_files($target_dir, $files_to_delete);

if (empty($files_to_delete)) {
    die("Error: Folder is empty or path is invalid.\n");
}


echo "The following items will be DELETED PERMANENTLY:\n";
echo "------------------------------------------------\n";
foreach ($files_to_delete as $item) {
    echo $item . "\n";
}
echo "------------------------------------------------\n";


echo "Are you sure you want to delete these? (type 'yes' to confirm): ";
$handle = fopen("php://stdin", "r");
$line = fgets($handle);

if (trim(strtolower($line)) != 'yes') {
    echo "\nDeletion ABORTED. No files were deleted.\n";
    exit;
}


echo "\nDeleting files...\n";
if (delete_directory($target_dir)) {
    echo "Success: Folder '$target_dir' has been deleted safely.\n";
} else {
    echo "Error: Something went wrong during deletion.\n";
}
?>