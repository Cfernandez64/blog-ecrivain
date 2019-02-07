<?php
namespace FormBuilder;

use \OCFram\FormBuilder;
use \OCFram\StringField;
use \OCFram\ImageField;
use \OCFram\TextField;
use \OCFram\MaxLengthValidator;
use \OCFram\UploadValidator;
use \OCFram\NotNullValidator;

class ConnexionFormBuilder extends FormBuilder
{
  public function build()
  {
    $this->form
       ->add(new StringField([
        'label' => 'Login',
        'name' => 'login',
        'maxLength' => 20,
        'placeholder'  => 'Entrez votre pseudo',
        'type'  => 'string',
        'validators' => [
          new MaxLengthValidator('Le pseudo spécifié est trop long (100 caractères maximum)', 100),
          new NotNullValidator('Merci de spécifier le pseudo'),
        ],
       ]))

       ->add(new StringField([
        'label' => 'Mot de passe',
        'name' => 'password',
        'maxLength' => 100,
        'placeholder'  => 'Entrez votre mot de passe',
        'type'  => 'password',
        'validators' => [
          new MaxLengthValidator('Le titre spécifié est trop long (100 caractères maximum)', 100),
          new NotNullValidator('Merci de spécifier le titre de la news'),
        ],
        ]));
  }
}
