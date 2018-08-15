<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class ImageUpload
 */
class ImageUpload
{
    private $targetDir;

    /**
     * @param targetDir $targetDir 
     */
    public function __construct(string $targetDir)
    {
        $this->targetDir = $targetDir;
    }

    /**
     * @param UploadedFile $file
     * @param string       $targetDir 
     * 
     * @return $fileName
     */
    public function upload(UploadedFile $file, string $targetDir = null)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        $file->move(
            $targetDir ? $targetDir : $this->getTargetDir(),
            $fileName
        );

        return $fileName;
    }

    /**
     * @return targetDir 
     */
    public function getTargetDir()
    {
        return $this->targetDir;
    }
}
