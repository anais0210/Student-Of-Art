<?php
namespace App\Services;

use App\Services\ImageUpload;
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
    public function __construct($targetDir)
    {
        $this->targetDir = $targetDir;
    }

    /**
     * @param UploadedFile $file
     * @return $fileName
     */
    public function upload(UploadedFile $file)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        $file->move($this->getTargetDir(), $fileName);

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
