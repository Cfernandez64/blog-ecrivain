<?php
namespace OCFram;

class ImageUpload
{
  protected $image;
  protected $location;
  public function upload($image, $location)
  {
    $file = basename($image);
    $name = $location.$file;
    move_uploaded_file($_FILES['image']['tmp_name'],$name);
  }
}
