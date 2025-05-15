<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class MailerService
{
    public function __construct(private HttpClientInterface $httpClient)
    {
    }

    public function sendEmail(array $emailData): array
    {
        $response = $this->httpClient->request('POST', ' http://127.0.0.1:8000/send-mail', [
            'json' => $emailData,
        ]);

        return $response->toArray();
    }
}