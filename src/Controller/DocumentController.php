<?php

namespace App\Controller;

use App\Model\DocumentManager;
use App\Services\FileService;
use App\Services\FileExeption;

class DocumentController extends AbstractController
{
    public function addDocuments(array $documents, int $postId): void
    {
        foreach ($documents['tmp_name'] as $i => $doc) {
            if (file_exists($doc)) {
                $authorizedExtensions = ['pdf', 'txt', 'doc', 'xls', 'csv', 'odt', 'ods', 'odp', 'ical'];
                $maxFileSize = 60000000;

                if (filesize($doc) > $maxFileSize) {
                    throw new FileExeption('The max upload size for a media content is 60MB');
                }

                if (!in_array(pathinfo($documents['name'][$i], PATHINFO_EXTENSION), $authorizedExtensions)) {
                    throw new FileExeption("Media content must be of type 'pdf', 'txt', 'doc', 'xls', 'csv', 'odt', 'ods', 'odp', 'ical'");
                }
            }

            $dir = 'uploads/uid-' . $_SESSION['user_id'] . '/';
            $name = uniqid('', true) . '.' . pathinfo($documents['name'][$i], PATHINFO_EXTENSION);
            $url = FileService::saveUploadedFile($doc, $dir, $name);

            $documentManager = new DocumentManager();
            $documentManager->insertDocument($url, $postId);
        }
    }
}
