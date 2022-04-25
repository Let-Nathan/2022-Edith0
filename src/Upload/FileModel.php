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
     * @param mixed $name
     */
    public function setName(mixed $name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getType(): mixed
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType(mixed $type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getTmpName(): mixed
    {
        return $this->tmpName;
    }

    /**
     * @param mixed $tmpName
     */
    public function setTmpName(mixed $tmpName): void
    {
        $this->tmpName = $tmpName;
    }

    /**
     * @return mixed
     */
    public function getError(): mixed
    {
        return $this->error;
    }

    /**
     * @param mixed $error
     */
    public function setError(mixed $error): void
    {
        $this->error = $error;
    }

    /**
     * @return mixed
     */
    public function getSize(): mixed
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize(mixed $size): void
    {
        $this->size = $size;
    }
}
