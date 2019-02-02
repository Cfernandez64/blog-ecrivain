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

    $widget .= '<label>'.$this->label.'</label><input id="'.$this->id.'" type="'.$this->type.'" name="'.$this->name.'"';

    $widget .= '>';

    return $widget.'</>';
  }

}
