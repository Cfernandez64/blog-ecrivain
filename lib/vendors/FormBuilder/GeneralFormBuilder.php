<?php
namespace FormBuilder;

use \OCFram\FormBuilder;
use \OCFram\StringField;
use \OCFram\ImageField;
use \OCFram\TextField;
use \OCFram\MaxLengthValidator;
use \OCFram\UploadValidator;
use \OCFram\NotNullValidator;

class GeneralFormBuilder extends FormBuilder
{
  public function build()
  {
    $this->form
       ->add(new StringField([
        'label' => 'Titre',
        'name' => 'titre',
        'maxLength' => 100,
        'placeholder'  => 'Entrez un titre',
        'type'  => 'string',
        'validators' => [
          new MaxLengthValidator('Le titre spécifié est trop long (100 caractères maximum)', 100),
          new NotNullValidator('Merci de spécifier le titre de la page'),
        ],
      ]))
      ->add(new TextField([
       'label' => 'Contenu',
       'name' => 'contenu',
       'id'    => 'myContent',
       'rows' => 8,
       'cols' => 100,
       'validators' => [
         new NotNullValidator('Merci de spécifier le contenu de la page'),
       ],
      ]));

  }
}
