<?php
/**
 * ApiController.php
 *
 * API Controller
 *
 * @category   Controller
 * @package    API_CPCV_19
 * @author     Néstor Carreño & Uri Ustrell
 */
 
namespace App\Controller;
 
use App\Entity\Exhibitor;
use App\Entity\Language;
use App\Entity\LayoutPage;
use App\Entity\Photography;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
 
/**
 * Class ApiController
 *
 * @Route("/api")
 */
class ApiController extends FOSRestController
{
    // Expositor URI's
 
    /**
     * @Rest\Get("/expositor/{id}", name="expositor", defaults={"id":"0"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Gets board info based on passed ID parameter."
     * )
     *
     * @SWG\Response(
     *     response=400,
     *     description="The board with the passed ID parameter was not found or doesn't exist."
     * )
     *
     * @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     type="string",
     *     description="The board ID"
     * )
     *
     *
     * @SWG\Tag(name="Expositor")
     */
    public function getExpositorInfo(Request $request, $id) {
        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getManager();
        $exhibitor = [];
        $message = "";
 
        try {
           $code = 201;
           $error = false;
           $name = "Nombre test";
 
           if (!is_null($name)) {
               $exhibitor = new Exhibitor();
               $exhibitor->setName($name);
 
               $em->persist($exhibitor);
               $em->flush();
 
           } else {
               $code = 500;
               $error = true;
               $message = "An error has occurred trying to add new board - Error: You must to provide a board name";
           }
 
        } catch (Exception $ex) {
            $code = 500;
            $error = true;
            $message = "An error has occurred trying to add new board - Error: {$ex->getMessage()}";
        }
 
        $response = [
            'code' => $code,
            'error' => $error,
            'data' => $code == 201 ? $exhibitor : $message,
        ];
 
        return new Response($serializer->serialize($response, "json"));
    }
}