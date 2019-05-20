<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GraphImgController extends AbstractController
{
    /**
     * @Route("/img", name="graph_img")
     */
    public function img()
    {
        return $this->render('graph_img.html.twig');
    }

    /**
     * @Route("/pie.svg", name="graph_pie")
     */
    public function pie()
    {
        return $this->setAsSvg(
            $this->render('graph/pie.svg.twig', [
                'data' => GraphController::FRUITS,
                'style' => file_get_contents(__DIR__ . '/../../public/assets/pie.css'),
            ])
        );
    }

    /**
     * @Route("/time.svg", name="graph_time")
     */
    public function time()
    {
        return $this->setAsSvg(
            $this->render('graph/time.svg.twig', [
                'data' => GraphController::WEIGHT,
                'style' => file_get_contents(__DIR__ . '/../../public/assets/time.css'),
            ])
        );
    }

    public function setAsSvg(Response $response)
    {
        $response->headers->set('Content-Type', 'image/svg+xml');

        return $response;
    }
}
