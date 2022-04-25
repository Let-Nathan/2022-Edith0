<?php

namespace App\Upload;

use App\Services\FileExeption;

class FileUploader
{
    private const UPLOAD_DIR = 'uploads/';
    private const DOCS_AUTHORIZED_EXT = ['pdf', 'txt', 'doc', 'xls', 'csv', 'odt', 'ods', 'odp', 'ical'];
    private const UPLOAD_MAX_SIZE = 60000000;
    private const MEDIA_AUTHORIZED_EXT = ['jpg', 'png', 'jpeg', 'mp4'];


    public function uploadDocument(FileModel $fileModel, int $userId): ?string
    {
        if (file_exists($fileModel->getTmpName())) {
            if ($fileModel->getSize() > self::UPLOAD_MAX_SIZE) {
                throw new FileExeption('The max upload size for a document is ' . self::UPLOAD_MAX_SIZE);
            }

            if (!in_array(pathinfo($fileModel->getName(), PATHINFO_EXTENSION), self::DOCS_AUTHORIZED_EXT)) {
                throw new FileExeption(
                    'A document must be of type' . implode(', ', self::DOCS_AUTHORIZED_EXT)
                );
            }
        }

        $name = uniqid('', true) . '.' . pathinfo($fileModel->getName(), PATHINFO_EXTENSION);

        $dir = self::UPLOAD_DIR . 'uid-' . $userId . '/';
        if (!is_dir($dir)) {
            mkdir($dir, 0666, true);
        }

        if (move_uploaded_file($fileModel->getTmpName(), $dir . $name)) {
            return $dir . $name;
        }

        return null;
    }

    public function uploadMedia(FileModel $fileModel, int $userId): ?string
    {
        if (file_exists($fileModel->getTmpName())) {
            if ($fileModel->getSize() > self::UPLOAD_MAX_SIZE) {
                throw new FileExeption('The max upload size for a media content is ' . self::UPLOAD_MAX_SIZE);
            }

            if (!in_array(pathinfo($fileModel->getName(), PATHINFO_EXTENSION), self::MEDIA_AUTHORIZED_EXT)) {
                throw new FileExeption(
                    'Media content must be of type' . implode(', ', self::MEDIA_AUTHORIZED_EXT)
                );
            }

            $name = uniqid('', true) . '.' . pathinfo($fileModel->getName(), PATHINFO_EXTENSION);

            $dir = self::UPLOAD_DIR . 'uid-' . $userId . '/';
            if (!is_dir($dir)) {
                mkdir($dir, 0666, true);
            }

            if (move_uploaded_file($fileModel->getTmpName(), $dir . $name)) {
                return $dir . $name;
            }
        }

        return null;
    }
}
