<?php
namespace OCFram;

class ImageUpload
{
  public function upload()
  {
    $file = basename($_FILES['image']['name']);
    $name = "images/$file";
    move_uploaded_file($_FILES['image']['tmp_name'],$name);
  }
}
