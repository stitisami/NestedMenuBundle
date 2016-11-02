<?php
namespace NestedMenuBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nested\MenuBundle\Entity\Menu;

class LoadNestedMenuData implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $menu = new Menu();
        $menu->setTitle('Item menu 1');
        $menu->setUrl('/item_menu_1');
		$manager->persist($menu);
		$manager->flush();
		
		$menu2 = new Menu();
        $menu2->setTitle('Item menu 2');
        $menu2->setUrl('/item_menu_2');
		$menu2->setParent($menu->getId());
		$manager->persist($menu2);
		$manager->flush();
	
		$menu21 = new Menu();
        $menu21->setTitle('Item menu 2-1');
        $menu21->setUrl('/item_menu_2_1');
		$menu21->setParent($menu2->getId());
		$manager->persist($menu21);
        $manager->flush();
    }
	
	
}