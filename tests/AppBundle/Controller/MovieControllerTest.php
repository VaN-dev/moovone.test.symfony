<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class MovieControllerTest extends WebTestCase
{
    public function testGetMoviesAction()
    {
        $client = static::createClient();

        $client->request('GET', '/v1/movies');

        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }

    public function testGetMovieAction()
    {
        $client = static::createClient();

        $client->request('GET', '/v1/movies/1');

        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }

    public function testPostMovieAction()
    {
        $client = static::createClient();

        $data = [
            "name" => "unit test movie",
        ];

        $client->request('POST', '/v1/movies', $data);

        $this->assertEquals(Response::HTTP_CREATED, $client->getResponse()->getStatusCode());
        $this->assertContains("name", $client->getResponse()->getContent());
    }

    public function testDeleteMovieAction()
    {
        $client = static::createClient();

        $client->request('DELETE', '/v1/movies/4');

        $this->assertEquals(Response::HTTP_NO_CONTENT, $client->getResponse()->getStatusCode());
    }
}