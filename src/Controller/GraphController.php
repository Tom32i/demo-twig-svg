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

    const WEIGHTS = [
        '1999' => [127, 92, 61],
        '2000' => [122, 98, 79],
        '2001' => [124, 112, 89],
        '2002' => [135, 128, 93],
        '2003' => [151, 132, 110],
        '2004' => [164, 138, 108],
        '2005' => [148, 124, 89],
        '2006' => [146, 113, 96],
        '2007' => [132, 101, 80],
        '2008' => [127, 107, 96],
        '2009' => [114, 83, 67],
        '2010' => [98, 66, 51],
        '2011' => [112, 72, 55],
        '2012' => [135, 102, 77],
        '2013' => [156, 124, 106],
        '2014' => [222, 148, 125],
        '2015' => [198, 136, 118],
        '2016' => [116, 98, 63],
        '2017' => [96, 73, 43],
        '2018' => [92, 67, 55],
        '2019' => [108, 56, 23],
    ];

    /**
     * @Route("/", name="graph")
     */
    public function embedded()
    {
        return $this->render('graph.html.twig', [
            'pie' => self::FRUITS,
            'histogram' => self::WEIGHT,
            'curve' => self::WEIGHTS,
        ]);
    }
}
