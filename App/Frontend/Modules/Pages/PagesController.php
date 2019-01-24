<?php
namespace App\Frontend\Modules\Pages;

use \OCFram\BackController;
use \OCFram\HTTPRequest;

class PagesController extends BackController
{
  public function executeIndex(HTTPRequest $request)
  {
    $this->page->addVar('title', 'A propos');
  }
}
