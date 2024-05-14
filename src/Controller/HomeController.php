<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(Request $request, EventRepository $eventRepository): Response
    {
        $events = $eventRepository->findAll();

        if($request->get('filter')){
            $filter = explode('_', $request->get('filter'));
            $pizzas = $eventRepository->findBy([], [$filter[0] => $filter[1]]);
        }

        if($request->get('inputMin') || $request->get('inputMax')){
            $priceMax = ((int)$request->get('inputMax') *100 ? : 100000);
            $priceMin = ((int)$request->get('inputMin') *100 ? : 0);

            $pizzas = $eventRepository->findByPriceRange($priceMin,$priceMax);
        }

        return $this->render('home/index.html.twig', compact('events'));
    }
}
