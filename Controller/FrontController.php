<?php

namespace NestedMenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class FrontController extends Controller
{

    public function indexAction()
    {
	
		$menu = $this->container->get('front_menu_controller')->loadMenuNested();
		return new Response($menu);
			
    }

}
