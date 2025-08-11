<?php

namespace App\Providers;

use App\Models\PersonalUser;
use App\Models\ProjectLog;
use App\Models\UserProject;
use App\Services\CardService;

use App\Services\PersonalUserService;
use App\Services\ProjectLogService;
use App\Services\ProjectService;
use App\Services\TaskService;
use App\Services\UserProjectService;
use Illuminate\Support\ServiceProvider; // Add
class ServicesProvider extends ServiceProvider
{

    public function register() {
        
        $this->app->bind(CardService::class, function ($app) {
            return new CardService(new \App\Models\Card);        
        });

        $this->app->bind(PersonalUserService::class, function ($app) {
            return new PersonalUserService(new \App\Models\PersonalUser);        
        });

        $this->app->bind(ProjectLogService::class, function ($app) {
            return new ProjectLogService(new \App\Models\ProjectLog);        
        });

        $this->app->bind(ProjectService::class, function ($app) {
            return new ProjectService(new \App\Models\Project);        
        });

        $this->app->bind(TaskService::class, function ($app) {
            return new TaskService(new \App\Models\Task);        
        });

        $this->app->bind(UserProjectService::class, function ($app) {
            return new UserProjectService(new \App\Models\UserProject, $app->make(PersonalUserService::class));
        });

    }
}
