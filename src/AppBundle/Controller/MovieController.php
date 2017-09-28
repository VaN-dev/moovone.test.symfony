<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Movie;
use AppBundle\Form\Type\MovieType;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Request\ParamFetcher;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class MovieController
 * @package AppBundle\Controller
 */
class MovieController extends Controller
{
    /**
     * @Rest\Get("/movies")
     * @Rest\View(serializerGroups={"movie"})
     * @Rest\QueryParam(name="order", default="id", requirements="(id|name)", nullable=true, description="Sorted field")
     * @Rest\QueryParam(name="dir", default="asc", requirements="(asc|desc)", nullable=true, description="Sort direction")
     *
     * @param Request $request
     * @param ParamFetcher $paramFetcher
     * @return JsonResponse
     */
    public function getMoviesAction(Request $request, ParamFetcher $paramFetcher)
    {
        $dir = $paramFetcher->get('dir');
        $order = $paramFetcher->get('order');
        $page = $request->query->get('page', 1);

        try {
            $pagerfanta = $this->getDoctrine()->getRepository('AppBundle:Movie')->getPaginated($page, Movie::MAX_RESULTS_PER_PAGE, $order, $dir);

            $movies = [];
            foreach ($pagerfanta->getCurrentPageResults() as $movie) {
                /**
                 * @var Movie $movie
                 */
                $movies[] = [
                    'id' => $movie->getId(),
                    'name' => $movie->getName(),
                ];
            }

            $response = new JsonResponse([
                'total' => $pagerfanta->getNbResults(),
                'count' => count($movies),
                'data' => $movies,
            ], Response::HTTP_OK);
        } catch (\Exception $e  ) {
            $response = new JsonResponse('Page not found.', Response::HTTP_NOT_FOUND);
        }

        return $response;
    }

    /**
     * @Rest\Get("/movies/{id}")
     * @Rest\View(serializerGroups={"movie"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function getMovieAction(Request $request)
    {
        $encoder = $this->get('app.encoder.id');
        $id = $encoder->decode($request->get('id'));
        $movie = $this->getDoctrine()->getRepository('AppBundle:Movie')->find($id);

        if (null === $movie) {
            return new JsonResponse(['message' => 'Movie not found'], Response::HTTP_NOT_FOUND);
        }

        $data = [
            'id' => $movie->getId(),
            'name' => $movie->getName(),
        ];

        return new JsonResponse($data);
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/movies")
     *
     * @param Request $request
     * @return Movie|Form
     */
    public function postMovieAction(Request $request)
    {
        $form = $this->createForm(MovieType::class, $movie = new Movie());

        $form->submit($request->request->all());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($movie);
            $em->flush();

            // refreshing entity, so postLoad event is triggered (and id is hashed)
            $em->refresh($movie);

            return $movie;
        } else {
            return $form;
        }
    }

    /**
     * @Rest\Delete("/movies/{id}")
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteMovieAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $encoder = $this->get('app.encoder.id');
        $id = $encoder->decode($request->get('id'));
        $movie = $em->getRepository('AppBundle:Movie')->find($id);

        if (null === $movie) {
            return new JsonResponse("Resource not found.", Response::HTTP_NOT_FOUND);
        }

        $movie->setDeletedAt(new \DateTime());
        $em->flush();
    }
}
