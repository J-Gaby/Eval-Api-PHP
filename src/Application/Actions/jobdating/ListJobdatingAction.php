<?php
declare(strict_types=1);

namespace App\Application\Actions\jobdating;

use Psr\Http\Message\ResponseInterface as Response;

class ListjobdatingAction extends jobdatingAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $jobdatings = $this->jobdatingRepository->findAll();

        $this->logger->info("jobdatings list was viewed.");

        return $this->respondWithData($jobdatings);
    }
}
