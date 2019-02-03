<?php
namespace OCFram;

class UploadValidator extends Validator
{
  protected $maxSize,
            $extensionFile,
            $fileName;

  public function __construct($maxSize)
  {
    $this->setMaxSize($maxSize);
  }

  public function isValid($value)
  {
    return int($value) <= $this->maxSize;
  }

  public function setMaxSize($maxSize)
  {
    if ($maxSize > 0)
    {
      $this->maxSize = $maxSize;
    }
    else
    {
      throw new \RuntimeException('Le fichier doit peser au moins 1 octet.');
    }
  }
}
