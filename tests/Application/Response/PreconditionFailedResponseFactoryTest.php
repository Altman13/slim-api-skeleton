<?php

namespace Skeleton\Application\Response;

use PHPUnit\Framework\TestCase;

class PreconditionFailedResponseFactoryTest extends TestCase
{
    public function testShouldBeProblemJson()
    {
        $response = (new PreconditionFailedResponseFactory)->create("Yo! MTV Raps");
        $this->assertEquals(
            "application/problem+json",
            $response->getHeaderLine("Content-type")
        );
    }

    public function testShouldHaveTitle()
    {
        $response = (new ForbiddenResponseFactory)->create("Yo! MTV Raps");
        $json = json_decode($response->getBody(), true);
        $this->assertEquals("Yo! MTV Raps", $json["title"]);
    }
}
