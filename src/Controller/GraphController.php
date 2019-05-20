<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GraphController extends AbstractController
{
    const FRUITS = [
        'fruit.apricot' => 0.38,
        'fruit.melon' => 0.18,
        'fruit.peach' => 0.065,
        'fruit.fig' => 0.14,
        'fruit.plum' => 0.235,
    ];

    const WEIGHT = [
        '2018-01-01' => 127,
        '2018-02-01' => 114,
        '2018-03-01' => 98,
        '2018-04-01' => 112,
        '2018-05-01' => 135,
        '2018-06-01' => 156,
        '2018-07-01' => 222,
        '2018-08-01' => 198,
        '2018-09-01' => 116,
        '2018-10-01' => 96,
        '2018-11-01' => 92,
        '2018-12-01' => 108,
    ];

    /**
     * @Route("/", name="graph")
     */
    public function embedded()
    {
        return $this->render('graph.html.twig', [
            'pie' => self::FRUITS,
            'time' => self::WEIGHT,
        ]);
    }
}
