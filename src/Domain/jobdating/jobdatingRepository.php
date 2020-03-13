<?php
declare(strict_types=1);

namespace App\Domain\jobdating;

interface jobdatingRepository
{
    /**
     * @return jobdating[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return jobdating
     * @throws jobdatingNotFoundException
     */
    public function findjobdatingOfId(int $id): jobdating;
}