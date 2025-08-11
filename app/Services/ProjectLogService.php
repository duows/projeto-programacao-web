<?php

namespace App\Services;

use App\Models\ProjectLog;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Services\Base\AbstractService;

class ProjectLogService extends AbstractService
{
    protected $repository;
    public function __construct(ProjectLog $projectLog)
    {
        $this->repository = $projectLog;
        parent::__construct($projectLog);
    }

}
