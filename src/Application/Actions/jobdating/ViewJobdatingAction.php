<?php
declare(strict_types=1);

namespace App\Application\Actions\jobdating;

use Psr\Http\Message\ResponseInterface as Response;

class ViewjobdatingAction extends jobdatingAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $jobdatingId = (int) $this->resolveArg('id');
        $jobdating = $this->jobdatingRepository->findjobdatingOfId($jobdatingId);

        $this->logger->info("jobdating of id `${jobdatingId}` was viewed.");

        return $this->respondWithData($jobdating);
    }
}
