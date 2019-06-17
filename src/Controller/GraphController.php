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
        '1999' => [ 92, 127 ],
        '2000' => [ 98, 122 ],
        '2001' => [ 112, 124 ],
        '2002' => [ 128, 135 ],
        '2003' => [ 132, 151 ],
        '2004' => [ 138, 164 ],
        '2005' => [ 124, 148 ],
        '2006' => [ 113, 146 ],
        '2007' => [ 101, 132 ],
        '2008' => [ 107, 127 ],
        '2009' => [ 83, 114 ],
        '2010' => [ 66, 98 ],
        '2011' => [ 72, 112 ],
        '2012' => [ 102, 135 ],
        '2013' => [ 124, 156 ],
        '2014' => [ 148, 222 ],
        '2015' => [ 136, 198 ],
        '2016' => [ 98, 116 ],
        '2017' => [ 73, 96 ],
        '2018' => [ 67, 92 ],
        '2019' => [ 56, 108 ],
    ];

    /**
     * @Route("/", name="graph")
     */
    public function embedded()
    {
        return $this->render('graph.html.twig', [
            'pie' => self::FRUITS,
            'histogram' => self::WEIGHT,
            'courbes' => [
                array_map('end', self::WEIGHTS),
                array_map('reset', self::WEIGHTS),
            ],
        ]);
    }
}
