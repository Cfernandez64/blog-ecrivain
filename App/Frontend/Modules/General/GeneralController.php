<?php
namespace App\Frontend\Modules\General;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \OCFram\FormHandler;

class GeneralController extends BackController
{

  public function executeIndex(HTTPRequest $request)
  {
    $nombreGeneral = $this->app->config()->get('nombre_general');
    $nombreCaracteres = $this->app->config()->get('nombre_caracteres');

    // On ajoute une définition pour le titre.
    $this->page->addVar('title', 'Liste des '.$nombreGeneral.' dernières general');

    // On récupère le manager des general.
    $manager = $this->managers->getManagerOf('General');

    $listeGeneral = $manager->getList(0, $nombreGeneral);

    foreach ($listeGeneral as $general)
    {
      if (strlen($general->contenu()) > $nombreCaracteres)
      {
        $debut = substr($general->contenu(), 0, $nombreCaracteres);
        $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';

        $general->setContenu($debut);
      }
    }

    // On ajoute la variable $listeGeneral à la vue.
    $this->page->addVar('listeGeneral', $listeGeneral);
  }
  public function executeShow(HTTPRequest $request)
  {
    $general = $this->managers->getManagerOf('General')->getUnique($request->getData('id'));

    if (empty($general))
    {
      $this->app->httpResponse()->redirect404();
    }
    $this->page->setHtmlheader('normal');
    $this->page->setModule('general');
    $this->page->addVar('title', $general->titre());
    $this->page->addVar('general', $general);
  }
}
