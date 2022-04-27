<?php

namespace App\Upload;

class FileModel
{
    private $name;
    private $type;
    private $tmpName;
    private $error;
    private $size;

    public function __construct(array $files, int $id = 0)
    {
        empty($files['name'][$id]) ? null : $this->name = $files['name'][$id];
        empty($files['type'][$id]) ? null : $this->type = $files['type'][$id];
        empty($files['tmp_name'][$id]) ? null : $this->tmpName = $files['tmp_name'][$id];
        empty($files['error'][$id]) ? null : $this->error = $files['error'][$id];
        empty($files['size'][$id]) ? 0 : $this->size = $files['size'][$id] ;
    }

    /**
     * @return mixed
     */
    public function getName(): mixed
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getType(): mixed
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getTmpName(): mixed
    {
        return $this->tmpName;
    }

    /**
     * @return mixed
     */
    public function getError(): mixed
    {
        return $this->error;
    }

    /**
     * @return mixed
     */
    public function getSize(): mixed
    {
        return $this->size;
    }
}
