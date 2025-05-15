<?php

namespace App\Tests\Api;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Api extends TestCase
{
    private HttpClientInterface $client;
    private string $jwtToken;

    protected function setUp(): void
    {
        $this->client = HttpClient::create();

        $response = $this->client->request('POST', '<http://localhost:8000/api/login_check>', [
            'json' => [
                'username' => 'test@example.com',
                'password' => 'password',
            ],
        ]);

        $data = $response->toArray();
        $this->jwtToken = $data['token'];
    }

    public function testGetScores(): void
    {
        $response = $this->client->request('GET', '<http://localhost:8000/api/scores>', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->jwtToken,
            ],
        ]);

        $this->assertEquals(200, $response->getStatusCode());

        $data = $response->toArray();
        $this->assertIsArray($data);
    }

    public function testAddScore(): void
    {
        // test sur le point d'api pour ajouter un score
    }
}