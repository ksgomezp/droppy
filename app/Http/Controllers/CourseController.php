<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use function GuzzleHttp\json_decode;

class CourseController extends Controller
{
    public function index(Client $client)
    {
        $data = [];
        $response = $client->request('GET', "courses");
        $data = json_decode($response->getBody()->getContents(),true);
        return view('course.index')->with('data', $data);
    }

    public function show($courseId)
    {
       
    }
}
