<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectFormRequest;
use App\Models\Project;
use App\Services\ProjectService;
use App\Services\ProjectServiceInterface;
use Illuminate\Http\Request;

class ProjectRestController extends Controller
{
    private $service;

    public function __construct(ProjectService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function get(Request $request)
    {
        $pesquisar = $request->pesquisar ?? "";
        $page = $request->qtdPorPag ?? 5;
        $registros = $this->service->index($pesquisar, $page);


        return response()->json([
            'registro'=> $registros,
            'status'=>200,
            ],200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function post(ProjectFormRequest $request)
    {
        
        $registro = $request->all();
        try{
            $this->service->store($registro);
            return response()->json([
                'message' => 'Registro salvo com sucesso',
                'status' => 201,
            ], 201);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Erro ao salvar o registro',
                'status' => 500,
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function getById(string $id)
    {
        //
        $registro = $this->service->show($id);
        
        try{
            return response()->json([
                'registro' => $registro,
                'status' => 200,
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Erro ao mostrar o registro',
                'status' => 500,
            ], 500);
        }  
    }

    /**
     * Update the specified resource in storage.
     */
    public function put(Request $request, string $id)
    {
        $registro = $request->all();
        try{
            $this->service->update($registro, $request->id);
            return response()->json([
                'message'=> 'Registro atualizado com sucesso',
                'status'=> 200,
                ], 200);
        }catch(\Exception $e){
            throw new \Exception('Erro ao atualizar o registro');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        //
        $this->service->destroy($id);

        return response()->json([], 204);
    }

    public function getCards(string  $id)
    {

        try{
            $cards = $this->service->getCards($id);
            return response()->json([
                'cards'=> $cards,
                'status'=> 200,
                ], 200);
        }catch(\Exception $e){
            throw new \Exception('Erro ao mostrar o card');         
        }
    }

    public function getCardById(string $id, string $card_id)
    {
        try{
            $card = $this->service->getCardById($id, $card_id);
            return response()->json([
                'card'=> $card,
                'status'=> 200,
                ], 200);
        }catch(\Exception $e){
            throw new \Exception('Erro ao mostrar o card');         
        }
    }

    public function getCardTasks(string $id, string $card_id){
        try{
            $tasks = $this->service->getCardTasks($id, $card_id);
            return response()->json([
                'tasks'=> $tasks,
                'status'=> 200,
                ], 200);
        }catch(\Exception $e){
            throw new \Exception('Erro ao mostrar a tarefa do card');         
        }
    }

    public function getCardTaskById(string $id, string $card_id, string $task_id) {
        try{
            $tasks = $this->service->getCardTaskById($id, $card_id, $task_id);
            return response()->json([
                'tasks'=> $tasks,
                'status'=> 200,
                ], 200);
        }catch(\Exception $e){
            throw new \Exception('Erro ao mostrar a tarefa do card');         
        }        
    }
}
