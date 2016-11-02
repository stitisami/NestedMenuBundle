<?php

namespace NestedMenuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use NestedMenuBundle\Utils\Slug as Slug;

/**
 * Menu
 *
 * @ORM\Table(name="menu_nested")
 * @ORM\Entity(repositoryClass="NestedMenuBundle\Repository\MenuRepository")
 */
class Menu
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

	 /**
     * @var boolean
     *
     * @ORM\Column(name="hide", type="boolean", nullable=true)
     */
    private $hide;
	
    /**
     * @var integer
     *
     * @ORM\Column(name="sorted", type="integer", nullable=true)
     */
    private $sorted;
	
	
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Menu
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Menu
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

	

    /**
     * Set hide
     *
     * @param boolean $hide
     * @return Menu
     */
    public function setHide($hide)
    {
        $this->hide = $hide;

        return $this;
    }

    /**
     * Get hide
     *
     * @return boolean 
     */
    public function getHide()
    {
        return $this->hide;
    }

	
	
	/**
     * Set sorted
     *
     * @param integer $sorted
     * @return Menu
     */
    public function setSorted($sorted)
    {
        $this->sorted = $sorted;

        return $this;
    }
	

    /**
     * Get sorted
     *
     * @return integer 
     */
    public function getSorted()
    {
        return $this->sorted;
    }

	
	/**
     * @var integer
     *
     * @ORM\Column(name="parent", type="integer", nullable=true)
     */
    private $parent;
	
	/**
     * Set parent
     *
     * @param integer $parent
     * @return Menu
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }
	

    /**
     * Get parent
     *
     * @return integer 
     */
    public function getParent()
    {
        return $this->parent;
    }
	

   
	
	
     public function __toString()
    {
        return $this->title;
    }

    
	
}
