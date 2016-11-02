<?php

namespace NestedMenuBundle\Service;

use NestedMenuBundle\Entity\Menu;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\TwigBundle\TwigEngine as TemplatingService;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpFoundation\Response;

class NestedMenuService
{

	protected $templating;
	protected $doctrine;

    public function __construct(TwigEngine $templating, Registry $doctrine)
    {
        $this->templating = $templating;
		$this->doctrine = $doctrine;
    }
	
	
    public function loadMenuNested()
    {
	
		$em = $this->doctrine->getManager();
		$menus = $em->getRepository('NestedMenuBundle:Menu')->findBy(array('hide'=>NULL), array('sorted' => 'ASC'));
		
		$nested_menu = $this->buildMenu($menus);

		return $this->templating->render(
            'NestedMenuBundle:menu:indexFront.html.twig',
            array('nested_menu' => $nested_menu)
        );
		
    }
	
	

	
		
	function buildMenu($menu, $parentid = 0) 
	{ 
	
	  $result = null;
	  foreach ($menu as $item)
	  if ($item->getParent() == $parentid) {
			$item_json = json_encode($item);
			$result .= "<li>
			  <a href='{$item->getUrl()}'>{$item->getTitle()}</a>
			  ". $this->buildMenu($menu, $item->getId()) . "</li>";
			 
		}
			return $result ?  "\n<ul>\n$result</ul>\n" : null;
	  

	}
	
	



}
