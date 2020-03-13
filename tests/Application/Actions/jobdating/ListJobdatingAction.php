<?php
declare(strict_types=1);

namespace Tests\Application\Actions\jobdating;

use App\Application\Actions\ActionPayload;
use App\Domain\jobdating\jobdatingRepository;
use App\Domain\jobdating\jobdating;
use DI\Container;
use Tests\TestCase;

class ListjobdatingAction extends TestCase
{
    public function testAction()
    {
        $app = $this->getAppInstance();

        /** @var Container $container */
        $container = $app->getContainer();

        $jobdating = new jobdating(1, '8h00', 'p01', 'Bil');

        $jobdatingRepositoryProphecy = $this->prophesize(jobdatingRepository::class);
        $jobdatingRepositoryProphecy
            ->findAll()
            ->willReturn([$jobdating])
            ->shouldBeCalledOnce();

        $container->set(jobdatingRepository::class, $jobdatingRepositoryProphecy->reveal());

        $request = $this->createRequest('GET', '/jobdatings');
        $response = $app->handle($request);

        $payload = (string) $response->getBody();
        $expectedPayload = new ActionPayload(200, [$jobdating]);
        $serializedPayload = json_encode($expectedPayload, JSON_PRETTY_PRINT);

        $this->assertEquals($serializedPayload, $payload);
    }
}