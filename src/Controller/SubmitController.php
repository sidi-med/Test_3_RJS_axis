<?php

namespace App\Controller;

use App\Entity\AirConditioning;
use App\Services\SubmitManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SubmitController extends AbstractController
{
    /**
     * @Route("/submit", name="submit", options={"expose"=true})
     */
    public function submit(Request $request, SubmitManager $submitManager)
    {
        $brightness = (int) $request->get('brightness',null);
        $shutter = (int) $request->get('shutter',null);
        $summer = (int) $request->get('summer',null);
        $winter = (int) $request->get('winter',null);
        $limitMin = (int) $request->get('limit_min',null);
        $limitMax = (int) $request->get('limit_max',null);
        $air = null;

        if (!$summer && !$winter) {
        } elseif (!$summer) {
            $air = [
                'mode' => AirConditioning::MODE_WINTER,
                'limit_max' => $limitMax,
                'limit_min' => $limitMin,
            ];

        } else {
            $air = [
                'mode' => AirConditioning::MODE_SUMMER,
                'limit_max' => $limitMax,
                'limit_min' => $limitMin,
            ];
        }

        $submitManager->save(compact('brightness', 'shutter', 'air'));


        return $this->render('submit/index.html.twig', [
            'controller_name' => 'SubmitController',
        ]);
    }
}
