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
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
 

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
     * @ManyToOne(targetEntity="Exhibitor", inversedBy="layoutPages")
     * @JoinColumn(name="exhibitor_id", referencedColumnName="id")
     */
    protected $exhibitor;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Language")
     * @JoinColumn(name="language_id", referencedColumnName="id")
     */
    protected $language;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Photography")
     * @JoinColumn(name="photography_id", referencedColumnName="id")
     */
    protected $photography;

 
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

    /**
     * @return mixed
     */
    public function getPhotography()
    {
        return $this->photography;
    }
 
    /**
     * @param mixed $photography
     */
    public function setPhotography($photography)
    {
        $this->photography = $photography;
    }
}