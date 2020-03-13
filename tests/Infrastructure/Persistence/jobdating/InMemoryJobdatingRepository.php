<?php
declare(strict_types=1);

namespace Tests\Infrastructure\Persistence\jobdating;

use App\Domain\jobdating\jobdating;
use App\Domain\jobdating\jobdatingNotFoundException;
use App\Infrastructure\Persistence\jobdating\InMemoryJobdatingRepository;
use Tests\TestCase;

class InMemoryJobdatingRepository extends TestCase
{
    public function testFindAll()
    {
        $jobdating = new jobdating(1, '8h00', 'p01', 'Bill');

        $jobdatingRepository = new InMemoryJobdatingRepository([1 => $jobdating]);

        $this->assertEquals([$jobdating], $jobdatingRepository->findAll());
    }

    public function testFindjobdatingOfId()
    {
        $jobdating = new jobdating(1, '8h00', 'p01', 'Bill');

        $jobdatingRepository = new InMemoryJobdatingRepository([1 => $jobdating]);

        $this->assertEquals($jobdating, $jobdatingRepository->findjobdatingOfId(1));
    }

    /**
     * @expectedException \App\Domain\jobdating\jobdatingNotFoundException
     */
    public function testFindjobdatingOfIdThrowsNotFoundException()
    {
        $jobdatingRepository = new InMemoryJobdatingRepository([]);
        $jobdatingRepository->findjobdatingOfId(1);
    }
}
