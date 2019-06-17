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
     * @Route("/pie.svg", name="graph_pie", defaults={"_format": "svg"})
     */
    public function pie()
    {
        return $this->render('graph/pie.svg.twig', [
            'data' => GraphController::FRUITS,
            'style' => file_get_contents(__DIR__ . '/../../public/assets/pie.css'),
        ]);
    }

    /**
     * @Route("/histogram.svg", name="graph_histogram", defaults={"_format": "svg"})
     */
    public function histogram()
    {
        return $this->render('graph/histogram.svg.twig', [
            'data' => GraphController::WEIGHT,
            'style' => file_get_contents(__DIR__ . '/../../public/assets/histogram.css'),
        ]);
    }
}
