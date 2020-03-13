<?php
declare(strict_types=1);

namespace App\Application\Actions\jobdating;

use App\Application\Actions\Action;
use App\Domain\jobdating\jobdatingRepository;
use Psr\Log\LoggerInterface;

abstract class jobdatingAction extends Action
{
    /**
     * @var jobdatingRepository
     */
    protected $jobdatingRepository;

    /**
     * @param LoggerInterface $logger
     * @param jobdatingRepository  $jobdatingRepository
     */
    public function __construct(LoggerInterface $logger, jobdatingRepository $jobdatingRepository)
    {
        parent::__construct($logger);
        $this->jobdatingRepository = $jobdatingRepository;
    }
}