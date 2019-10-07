<?php
/**
 * Exhibitor.php
 *
 * Exhibitor Entity
 *
 * @category   Entity
 * @package    API_CPCV_19
 * @author     Néstor Carreño & Uri Ustrell
 */
 
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
 
/**
 * Exhibitor
 *
 * @ORM\Table(name="exhibitor");
 * @ORM\Entity(repositoryClass="App\Repository\ExhibitorRepository");
 * @ORM\HasLifecycleCallbacks()
 */
class Exhibitor
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
 
    /**
     * @ORM\Column(name="name", type="string", length=150)
     */
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LayoutPage", mappedBy="exhibitor")
     */
    protected $layoutPages;

 
    public function __construct()
    {
        
    }
 
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
 
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
 
    /**
     * @param mixed $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
 
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPages()
    {
        return $this->pages;
    }
}