<?php
namespace App\Frontend\Modules\Goldenbook;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \OCFram\ImageUpload;
use \Entity\Goldenbook;
use \FormBuilder\GoldenbookFormBuilder;
use \OCFram\FormHandler;

class GoldenbookController extends BackController
{
  public function executeBook(HTTPRequest $request)
  {

    // On ajoute une définition pour le titre.
    $this->page->addVar('title', 'Livre d\'or');

    // On récupère le manager des gold.
    $manager = $this->managers->getManagerOf('Goldenbook');

    $golds = $manager->getList();

    // On ajoute la variable $golds à la vue.
    $this->page->addVar('golds', $golds);

    // Si le formulaire a été envoyé.
    if ($request->method() == 'POST')
    {
      $goldenbook = new Goldenbook([
        'gold' => $request->getData('id'),
        'pseudo' => $request->postData('pseudo'),
        'filename' => $request->fileName('image'),
        'contenu' => $request->postData('contenu')
      ]);
      $image = $goldenbook->image();
      $location = "images/users/";
      $upload = new ImageUpload($image, $location);
      $upload->upload($image, $location);
    }
    else
    {
      $goldenbook = new Goldenbook();
    }

    $formBuilder = new GoldenbookFormBuilder($goldenbook);
    $formBuilder->build();

    $form = $formBuilder->form();

    $formHandler = new FormHandler($form, $this->managers->getManagerOf('Goldenbook'), $request);
    if ($formHandler->process())
    {
        $this->app->httpResponse()->redirect('livre-or');
    }
    $this->page->addVar('form', $form->createView());
  }

    /*public function executeShow(HTTPRequest $request)
  {
    $gold = $this->managers->getManagerOf('Goldenbook')->getUnique($request->getData('id'));

    if (empty($gold))
    {
      $this->app->httpResponse()->redirect404();
    }



    // Si le formulaire a été envoyé.
    if ($request->method() == 'POST')
    {
      $comment = new Comment([
        'gold' => $request->getData('id'),
        'pseudo' => $request->postData('pseudo'),
        'contenu' => $request->postData('contenu')
      ]);
    }
    else
    {
      $comment = new Comment;
    }

    $formBuilder = new CommentFormBuilder($comment);
    $formBuilder->build();

    $form = $formBuilder->form();

    $formHandler = new FormHandler($form, $this->managers->getManagerOf('Comments'), $request);
    if ($formHandler->process())
    {
        $this->app->httpResponse()->redirect('gold-'.$request->getData('id'));
    }
    $this->page->addVar('form', $form->createView());

  }*/

  public function executeInsertComment(HTTPRequest $request)
  {
    // Si le formulaire a été envoyé.
    if ($request->method() == 'POST')
    {
      $comment = new Comment([
        'gold' => $request->getData('gold'),
        'pseudo' => $request->postData('pseudo'),
        'contenu' => $request->postData('contenu')
      ]);
    }
    else
    {
      $comment = new Comment;
    }

    $formBuilder = new CommentFormBuilder($comment);
    $formBuilder->build();

    $form = $formBuilder->form();

    $formHandler = new FormHandler($form, $this->managers->getManagerOf('Comments'), $request);

    if ($formHandler->process())
    {
      $this->app->user()->setFlash('Le commentaire a bien été ajouté, merci !');

      $this->app->httpResponse()->redirect('gold-'.$request->getData('gold'));
    }
    $this->page->setHtmlheader('normal');
    $this->page->setModule('gold');
    $this->page->addVar('comment', $comment);
    $this->page->addVar('form', $form->createView());
    $this->page->addVar('title', 'Ajout d\'un commentaire');
  }
}
