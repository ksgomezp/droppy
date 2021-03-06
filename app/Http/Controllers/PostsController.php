<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
       $client = new Client([
    
            'base_uri' => 'https://jsonplaceholder.typicode.com',
    
        ]);

        $response = $client->request('GET', 'posts');

        $posts = json_decode( $response->getBody()->getContents());

        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        //throw new Exception( __(posts.error) );
        try{
            $client = new Client([
    
                'base_uri' => 'https://jsonplaceholder.typicode.com',
        
            ]);
    
            $response = $client->request('GET', "posts/{$id}");
    
            $posts = json_decode( $response->getBody()->getContents());
    
            return view('posts.show', compact('posts'));
        }catch (Exception $e)
        {
            return view('posts.index', compact('posts'));
            echo ( __(posts.error) );
        }
       
    }
    
}
