<?php
declare(strict_types=1);

namespace App\Application\Actions\jobdating;

use Psr\Http\Message\ResponseInterface as Response;

class UpdatejobdatingAction extends jobdatingAction
{
    /**
     * {@inheritdoc}
     */

    protected function action(): Response
    {
        $jobdatingId = (int) $this->resolveArg('id');

        $datas = $this->getFormData();

        /**
         * @var jobdating
         */

        $jobdating = $this->jobdatingRepository->findjobdatingOfId($jobdatingId);

        /**
         * @var bool
         */

        $response = $jobdating->update($datas);

        $this->logger->info("jobdating of id `${jobdatingId}` was updated.");

        return $this->respondWithData(['updated'=>$response, "jobdating"=>$jobdating]);
    }
}
