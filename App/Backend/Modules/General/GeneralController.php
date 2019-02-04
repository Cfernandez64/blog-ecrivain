<?php
namespace App\Backend\Modules\General;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\General;
use \FormBuilder\GeneralFormBuilder;
use \OCFram\FormHandler;

class GeneralController extends BackController
{
  public function executeDelete(HTTPRequest $request)
  {
    $generalId = $request->getData('id');

    $this->managers->getManagerOf('General')->delete($generalId);

    $this->app->user()->setFlash('La general a bien été supprimée !');

    $this->app->httpResponse()->redirect('/admin/general');
  }

  public function executeIndex(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Gestion des pages');

    $manager = $this->managers->getManagerOf('General');
    $this->page->addVar('listeGeneral', $manager->getList());
    $this->page->addVar('nombreGeneral', $manager->count());
  }

  public function executeInsert(HTTPRequest $request)
  {
    $this->processForm($request);

    $this->page->addVar('title', 'Ajout d\'une page');
  }

  public function executeUpdate(HTTPRequest $request)
  {
    $this->processForm($request);

    $this->page->addVar('title', 'Modification d\'une page');
  }

  public function processForm(HTTPRequest $request)
  {
    if ($request->method() == 'POST')
    {
      $general = new General([
        'titre' => $request->postData('titre'),
        'contenu' => $request->postData('contenu')
      ]);

      if ($request->getExists('id'))
      {
        $general->setId($request->getData('id'));
      }
    }
    else
    {
      // L'identifiant de la general est transmis si on veut la modifier
      if ($request->getExists('id'))
      {
        $general = $this->managers->getManagerOf('General')->getUnique($request->getData('id'));
      }
      else
      {
        $general = new General;
      }
    }

    $formBuilder = new GeneralFormBuilder($general);
    $formBuilder->build();

    $form = $formBuilder->form();

    $formHandler = new FormHandler($form, $this->managers->getManagerOf('General'), $request);

    if ($formHandler->process())
    {
      $this->app->user()->setFlash($general->isNew() ? 'La page a bien été ajoutée !' : 'La page a bien été modifiée !');

      $this->app->httpResponse()->redirect('/admin/general');
    }

    $this->page->addVar('form', $form->createView());
  }
}
