<?php

namespace App\Services;

class FileService
{
    /**
     * @return string - full path to the saved file
     */
    public static function saveUploadedFile($fileTmpName, string $dir, string $fileName): string
    {
        if (!is_dir($dir)) {
            mkdir($dir, 0666, true);
        }

        move_uploaded_file($fileTmpName, $dir . $fileName);

        return $dir . $fileName;
    }
}
