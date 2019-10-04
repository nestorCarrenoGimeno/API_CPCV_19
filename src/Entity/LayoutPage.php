<?php
/**
 * LayoutPage.php
 *
 * LayoutPage Entity
 *
 * @category   Entity
 * @package    API_CPCV_19
 * @author     Néstor Carreño & Uri Ustrell
 */
 
namespace App\Entity;
 
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
 
/**
 * LayoutPage
 *
 * @ORM\Table(name="layout_page");
 * @ORM\Entity(repositoryClass="App\Repository\LayoutPageRepository");
 * @ORM\HasLifecycleCallbacks()
 */
class LayoutPage
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
 
    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Exhibitor")
     */
    protected $exhibitor;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Language")
     */
    protected $language;

 
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
    public function getExhibitor()
    {
        return $this->exhibitor;
    }
 
    /**
     * @param mixed $exhibitor
     */
    public function setExhibitor($exhibitor)
    {
        $this->exhibitor = $exhibitor;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }
 
    /**
     * @param mixed $language
     */
    public function setlanguage($language)
    {
        $this->language = $language;
    }
}