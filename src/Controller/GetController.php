<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class GetController extends AbstractController
{
    public function handle(Request $request)
    {
        dump($request);
        die;
    }
}
