<?php

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

use App\Service\QuoteService;

class QuoteController extends AbstractFOSRestController {
	
    /**
     * @Rest\Get("/{author}")
     * @param Request $request
     * @return View
     */
    public function getQuote($author, Request $request, QuoteService $quoteService): View
    {
		//var_dump(__LINE__);
		$response = $quoteService->fetchQuote($author, $request->query->get('limit'));
        return View::create($response, Response::HTTP_OK);
    }
}