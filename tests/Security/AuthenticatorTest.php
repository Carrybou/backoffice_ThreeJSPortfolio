<?php

namespace App\Tests\Security;

use App\Security\Authenticator;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class AuthenticatorTest extends TestCase
{
    public function testGetLoginUrl(): void
    {
        $urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        $urlGenerator->expects($this->once())
            ->method('generate')
            ->with(Authenticator::LOGIN_ROUTE)
            ->willReturn('/login');

        $authenticator = new Authenticator($urlGenerator);

        $request = new Request();
        $loginUrl = $authenticator->getLoginUrl($request);

        $this->assertEquals('/login', $loginUrl);
    }
}