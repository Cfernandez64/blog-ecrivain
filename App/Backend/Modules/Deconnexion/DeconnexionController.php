<?php
namespace App\Backend\Modules\Deconnexion;

use \OCFram\BackController;
use \OCFram\HTTPRequest;

class DeconnexionController extends BackController
{
  public function executeDeconnexion()
  {
    session_destroy();
    header('Location: /');
  }
}
