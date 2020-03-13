<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\jobdating;

use App\Domain\jobdating\jobdating;
use App\Domain\jobdating\jobdatingNotFoundException;
use App\Domain\jobdating\jobdatingRepository;

class InMemoryJobdatingRepository implements jobdatingRepository
{
    /**
     * @var jobdating[]
     */
    private $jobdatings;

    /**
     * InMemoryjobdatingRepository constructor.
     *
     * @param array|null $jobdatings
     */
    public function __construct(array $jobdatings = null)
    {
        $this->jobdatings = $jobdatings ?? [
            1 => new jobdating(1, '8h00', 'p01', 'BIll'),
            2 => new jobdating(2, '10h00', 'p03', 'Steve'),
            3 => new jobdating(3, '12h00', 'p02', 'Mark'),
            4 => new jobdating(4, '15h00', 'p04', 'Evan'),
            5 => new jobdating(5, '17h00', 'p05', 'Jack'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->jobdatings);
    }

    /**
     * {@inheritdoc}
     */
    public function findjobdatingOfId(int $id): jobdating
    {
        if (!isset($this->jobdatings[$id])) {
            throw new jobdatingNotFoundException();
        }

        return $this->jobdatings[$id];
    }
}