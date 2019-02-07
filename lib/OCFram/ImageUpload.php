<?php
namespace OCFram;

class ImageUpload
{
  protected $image;
  public function upload($image)
  {
    $file = basename($image);
    $name = "images/$file";
    move_uploaded_file($_FILES['image']['tmp_name'],$name);
  }
}
