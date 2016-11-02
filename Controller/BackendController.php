<?php

namespace NestedMenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NestedMenuBundle\Entity\Menu;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class BackendController extends Controller
{

    public function indexAction()
    {
		$em = $this->getDoctrine()->getManager();
		$menus = $em->getRepository('NestedMenuBundle:Menu')->findBy(array(), array('sorted' => 'ASC'));	
		$nested_menu = $this->buildMenu($menus);
        return $this->render('NestedMenuBundle:menu:index.html.twig', array('nested_menu'=>$nested_menu));
    }
	
	
		
	function buildMenu($menu, $parentid = 0) 
	{ 
	$serializer = $this->container->get('serializer');

	  $result = null;
	  foreach ($menu as $item)
	  if ($item->getParent() == $parentid) {
			$item_json = json_encode($item);
			
		$reports = $serializer->serialize($item, 'json');

			$hide_node = '';
			$result .= "<li class='dd-item nested-list-item' data-id='{$item->getId()}'>
			  <div class='dd-handle nested-list-handle'></div>
			  <div class='nested-list-content'>{$item->getTitle()}
				<span class='tip-msg'></span>
				<div class='pull-right'><span class='tip-hide'>{$hide_node}</span>
					<a href='#editModal' class='edit_toggle' rel='{$reports}'  data-toggle='modal'>Edit</a> |
					<a href='#deleteModal' class='delete_toggle' rel='{$item->getId()}' data-toggle='modal'>Delete</a>
				</div>
			  </div>" . $this->buildMenu($menu, $item->getId()) . "</li>";
			 
	  }
	   return $result ?  "\n<ol class=\"dd-list\">\n$result</ol>\n" : null;
	  

	}
	
	
	
	 public function addAction(Request $request)
    {
		try {
			$em = $this->getDoctrine()->getManager();
			$id	    = $request->get('id');
			$title  = $request->get('title');
			$hide  = $request->get('hide');
			$url    = $request->get('url');
			$menu = new Menu();
			$menu->setTitle($title);
			$menu->setHide($hide);
			$menu->setUrl($url);
			$em->persist($menu);
			$em->flush();
			
			return  new JsonResponse(array('status' => 1, 'message' => 'succes'));
		
		} catch (Exception $e){
		
			return  new JsonResponse(array('status' => $status, 'message' => 'fail!'));
			
		}
		
	}
	
	
	 public function editAction(Request $request)
    {
		try {
			$em = $this->getDoctrine()->getManager();
			$id	    = $request->get('id');
			$title  = $request->get('title');
			$hide  = $request->get('hide');
			$url    = $request->get('url');
			$menu = $em->getRepository('NestedMenuBundle:Menu')->findOneById($id);
			$menu->setTitle($title);
			$menu->setHide($hide);
			$menu->setUrl($url);
			$em->persist($menu);
			$em->flush();
			
			return  new JsonResponse(array('status' => 1, 'message' => 'succes'));
		
		} catch (Exception $e){
		
			return  new JsonResponse(array('status' => $status, 'message' => 'fail!'));
			
		}
		
	}
	
	
	 public function removeAction(Request $request)
    {
		try {
			$em = $this->getDoctrine()->getManager();
			$id	    = $request->get('id');
			$menu = $em->getRepository('NestedMenuBundle:Menu')->findOneById($id);
			$em->remove($menu);
			$em->flush();
			
			return  new JsonResponse(array('status' => 1, 'message' => 'succes'));
		
		} catch (Exception $e){
		
			return  new JsonResponse(array('status' => $status, 'message' => 'fail!'));
			
		}
		
	}
	
	
	
	
	
	
	 public function dragAction(Request $request)
    {
		try {
		
			$em = $this->getDoctrine()->getManager();
			
			$destination = $request->get('destination');
			$source	    = $request->get('source');
			
			$orders = 'NULL';
			
			if ($request->query->has('order')){
			$orders  = json_decode($request->get('order'));
			};
			
			$id = $request->get('source');
			
			$menu = $em->getRepository('NestedMenuBundle:Menu')->findOneById($id);
			
			$menu->setParent($destination);
			$em->persist($menu);
			$em->flush();
			
			
			foreach($orders as $sort => $id){
				$menu = $em->getRepository('NestedMenuBundle:Menu')->findOneById($id);
				$menu->setSorted($sort);
				$em->persist($menu);
				$em->flush();
		
			}
	
	
			
			return  new JsonResponse(array('status' => 1, 'message' => 'succes'));
		
		} catch (Exception $e){
		
			return  new JsonResponse(array('status' => $status, 'message' => 'fail!'));
			
		}
		
	}
	

	
	



}
