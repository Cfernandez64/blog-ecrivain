<?php
namespace App\Backend\Modules\Connexion;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Connexion;
use \FormBuilder\ConnexionFormBuilder;
use \OCFram\FormHandler;

class ConnexionController extends BackController
{

  public function executeIndex(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Connexion');
    $manager = $this->managers->getManagerOf('Connexion');
    $this->processForm($request);

  }
  public function processForm(HTTPRequest $request)
  {
    if ($request->method() == 'POST')
    {
      $log = new Connexion([
        'login' => $request->postData('login'),
        'password' => $request->postData('password')
      ]);
    }
    else
    {
        $log = new Connexion();
    }

    $formBuilder = new ConnexionFormBuilder($log);
    $formBuilder->build();

    $form = $formBuilder->form();

    $formHandler = new FormHandler($form, $this->managers->getManagerOf('Connexion'), $request);



    if ($formHandler->connect($log))
    {
      $manager = $this->managers->getManagerOf('Connexion');
      $data = $manager->connect($log);

          if ($request->postExists('login'))
          {
            $login = $request->postData('login');
            $password = $request->postData('password');

            if ($login == $data['login'] && $password == $data['password'])
            {
              $this->app->user()->setAuthenticated(true);
              $this->app->httpResponse()->redirect('dashboard/');
            }
            else
            {
              $this->app->user()->setFlash('Le pseudo ou le mot de passe est incorrect.');
            }
          }
    }

    $this->page->addVar('form', $form->createView());
  }
}
