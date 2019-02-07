<?php
namespace FormBuilder;

use \OCFram\FormBuilder;
use \OCFram\StringField;
use \OCFram\TextField;
use \OCFram\MaxLengthValidator;
use \OCFram\NotNullValidator;

class GoldenbookFormBuilder extends FormBuilder
{
  public function build()
  {
    $this->form->add(new StringField([
        'label' => 'Pseudo',
        'name' => 'pseudo',
        'maxLength' => 50,
        'type'    => 'text',
        'validators' => [
          new MaxLengthValidator('Le pseudo spécifié est trop long (50 caractères maximum)', 50),
          new NotNullValidator('Merci de spécifier le pseudo du commentaire'),
        ],
       ]))
       ->add(new TextField([
        'label' => 'Message',
        'name' => 'contenu',
        'rows' => 7,
        'cols' => 50,
        'validators' => [
          new NotNullValidator('Merci de spécifier votre message'),
        ],
       ]));
  }
}
