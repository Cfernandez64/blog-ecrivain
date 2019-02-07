<?php
namespace OCFram;

class ImageField extends Field
{

  public function buildWidget()
  {
    $widget = '';

    if (!empty($this->errorMessage))
    {
      $widget .= $this->errorMessage.'<br />';
    }

    $widget .= '<label>'.$this->label.'</label><br/><input id="'.$this->id.'" type="'.$this->type.'" name="'.$this->name.'" class="mb-3" ';

    $widget .= '>';

    return $widget.'</>';
  }



}
