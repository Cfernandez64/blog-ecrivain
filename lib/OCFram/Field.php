<?php
namespace OCFram;

abstract class Field
{
  use Hydrator;

  protected $errorMessage;
  protected $label;
  protected $name;
  protected $placeholder;
  protected $id;
  protected $validators = [];
  protected $value;
  protected $image;

  public function __construct(array $options = [])
  {
    if (!empty($options))
    {
      $this->hydrate($options);
    }
  }

  abstract public function buildWidget();

  public function isValid()
  {
    foreach ($this->validators as $validator)
    {
      if (!$validator->isValid($this->value))
      {
        $this->errorMessage = $validator->errorMessage();
        return false;
      }
    }

    return true;
  }

  public function label()
  {
    return $this->label;
  }

  public function length()
  {
    return $this->length;
  }

  public function name()
  {
    return $this->name;
  }
  public function placeholder()
  {
    return $this->placeholder;
  }

  public function id()
  {
    return $this->id;
  }

  public function type()
  {
    return $this->type;
  }

  public function validators()
  {
    return $this->validators;
  }

  public function value()
  {
    return $this->value;
  }

  public function setLabel($label)
  {
    if (is_string($label))
    {
      $this->label = $label;
    }
  }

  public function setLength($length)
  {
    $length = (int) $length;

    if ($length > 0)
    {
      $this->length = $length;
    }
  }

  public function setName($name)
  {
    if (is_string($name))
    {
      $this->name = $name;
    }
  }

  public function setPlaceholder($placeholder)
  {
    if (is_string($placeholder))
    {
      $this->placeholder = $placeholder;
    }
  }

  public function setId($id)
  {
    if (is_string($id))
    {
      $this->id = $id;
    }
  }

  public function setType($type)
  {
    if (is_string($type))
    {
      $this->type = $type;
    }
  }

  public function setValidators(array $validators)
  {
    foreach ($validators as $validator)
    {
      if ($validator instanceof Validator && !in_array($validator, $this->validators))
      {
        $this->validators[] = $validator;
      }
    }
  }

  public function setValue($value)
  {
    if (is_string($value))
    {
      $this->value = $value;
    }
  }
}
