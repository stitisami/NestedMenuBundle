<?php

namespace NestedMenuBundle\Twig;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;


class NestedMenuExtension extends \Twig_Extension
{
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function getFunctions()
    {
        
		 return array(
            new \Twig_SimpleFunction('nestedMenu', 
                array($this, 'nestedMenuFunction'),
                array('is_safe' => array('html'))
            ),
        );
		
		
    }

	

    public function nestedMenuFunction()
    {
        return $this->container->get('front_menu_controller')->loadMenuNested();
    }
	
}