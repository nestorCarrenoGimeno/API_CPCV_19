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
    // Exhibitor URI's
 
    /**
     * @Rest\Get("/exhibitor/{id}", name="Exhibitor")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns all the data for a single exhibitor."
     * )
     *
     * @SWG\Response(
     *     response=400,
     *     description="The exhibitor with the passed ID parameter was not found or doesn't exist."
     * )
     *
     * @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     type="integer",
     *     description="The exhibitor ID"
     * )
     *
     *
     * @SWG\Tag(name="Exhibitor")
     */
    public function getExhibitorUpdatedData(Request $request, $id) {
        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getManager();
        $exhibitor = [];
        $message = "Error";
 
        try {
            $code = 200;
            $error = false;
            $name = "Nombre test";
 
            $exhibitor_id = $id;
            $exhibitor = $em->getRepository("App:Exhibitor")->find($exhibitor_id);
 
        } catch (Exception $ex) {
            $code = 500;
            $error = true;
            $message = "An error has occurred trying to add new board - Error: {$ex->getMessage()}";
        }
 
        $response = [
            'code' => $code,
            'error' => $error,
            'data' => $code == 200 ? $exhibitor : $message,
        ];
 
        return new Response($serializer->serialize($response, "json"));
    }
}