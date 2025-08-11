<?php

namespace App\Services;

use App\Models\Project;
use App\Services\Base\AbstractService;

class ProjectService extends AbstractService
{
    protected $repository;
    public function __construct(Project $project)
    {
        $this->repository = $project;
        parent::__construct($project);
    }


    public function getCards($id)
    {
        try {
            $card = $this->repository->join('card', 'card.project_id', '=', 'project.id')
                ->where('project.id', $id)->get();

            return $card;
        } catch (\Exception $e) {
            throw new \Exception('Erro ao buscar os cards do projeto: ' . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function getCardTasks($id, $card_id)
    {
        try {

            $tasks = $this->repository->join('card', 'card.project_id', '=', 'project.id')
                ->join('task', 'card.id', '=', 'task.card_id')
                ->where('project.id', $id)
                ->where('card.id', $card_id)->select('task.*')->get();


            return $tasks;
        } catch (\Exception $e) {
            throw new \Exception('Erro ao buscar os cards do projeto: ' . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function getCardTaskById($id, $card_id, $task_id){
        try {

            $tasks = $this->repository->join('card', 'card.project_id', '=', 'project.id')
                ->join('task', 'card.id', '=', 'task.card_id')
                ->where('project.id', $id)
                ->where('task.id', $task_id)
                ->where('card.id', $card_id)->select('task.*')->get()->first();


            return $tasks;
        } catch (\Exception $e) {
            throw new \Exception('Erro ao buscar os cards do projeto: ' . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function getCardById ($id, $card_id) {
        try{
            $card = $this->repository->join('card', 'card.project_id', '=', 'project.id')->where('project.id', $id)->where('card.id', $card_id)->get()->first();

            return $card;
        }
        catch(\Exception $e){
            throw new \Exception('Erro ao buscar os cards do projeto: ' . $e->getMessage(), $e->getCode(), $e);
        }
    }


    //Talvez fazer um filtro para buscar por projetos: 
    /*
        - Finalizados
        - Em Andamento    
    */
}
