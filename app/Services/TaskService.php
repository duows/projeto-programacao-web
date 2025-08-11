<?php

namespace App\Services;

use App\Models\Task;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

use App\Services\Base\AbstractService;

class TaskService extends AbstractService 
{
    protected $repository;
    public function __construct(Task $task)
    {
        $this->repository = $task;
        parent::__construct($task);
    }

}
