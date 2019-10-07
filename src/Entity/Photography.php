<?php
/**
 * Photography.php
 *
 * Photography Entity
 *
 * @category   Entity
 * @package    API_CPCV_19
 * @author     Néstor Carreño & Uri Ustrell
 */
 
namespace App\Entity;
 
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
 
/**
 * Photography
 *
 * @ORM\Table(name="photography");
 * @ORM\Entity(repositoryClass="App\Repository\PhotographyRepository");
 * @ORM\HasLifecycleCallbacks()
 */
class Photography
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="photography_route", type="string")
     */
    protected $photographyRoute;
 
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
    public function getPhotographyBlob()
    {
        return $this->layoutPage;
    }
 
    /**
     * @param mixed $photographyBlob
     */
    public function setPhotographyBlob($photographyBlob)
    {
        $this->photographyBlob = $photographyBlob;
    }

    /**
     * @return mixed
     */
    public function getLayoutPage()
    {
        return $this->layoutPage;
    }
 
    /**
     * @param mixed $layoutPage
     */
    public function setLayoutPage($layoutPage)
    {
        $this->layoutPage = $layoutPage;
    }
}