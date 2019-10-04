<?php
/**
 * Language.php
 *
 * Language Entity
 *
 * @category   Entity
 * @package    API_CPCV_19
 * @author     Néstor Carreño & Uri Ustrell
 */
 
namespace App\Entity;
 
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
 
/**
 * Language
 *
 * @ORM\Table(name="language");
 * @ORM\Entity(repositoryClass="App\Repository\LanguageRepository");
 * @ORM\HasLifecycleCallbacks()
 */
class Language
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
}