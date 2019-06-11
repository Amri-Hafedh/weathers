<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;
//use Http\Factory\Guzzle\RequestFactory;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use Tuupola\Http\Factory\RequestFactory;
use Buzz\Client\FileGetContents;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {


// create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, "api.openweathermap.org/data/2.5/forecast?appid=4a54e92223fcb90872ffb5de0f41234b&id=6455259");

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);
        $json = json_decode($output);
echo "<pre>";var_dump($json); die;
        // close curl resource to free up system resources
        curl_close($ch);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'cityName' => 'Paris',
            'temperature'=>$weather->temperature
        ]);
    }
}
