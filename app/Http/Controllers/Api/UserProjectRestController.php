<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserProjectFormRequest;
use App\Models\UserProject;
use App\Services\UserProjectService;
use App\Services\UserProjectServiceInterface;
use Illuminate\Http\Request;

class UserProjectRestController extends Controller
{
    private $service;

    public function __construct(UserProjectService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function get(Request $request)
    {
        //
        $pesquisar = $request->pesquisar ?? "";
        $page = $request->qtdPorPag ?? 5;


        $registros = $this->service->index($pesquisar, $page);
        //$registros = Autor::paginate(10);
        return response()->json([
            'registro'=> $registros,
            'status'=>200,
            ],200
        );
    }


    public function post(UserProjectFormRequest $request)
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


    public function getById(string $id)
    {

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
        //
        $registro = $request->all();
        try{
            $this->service->update($registro, $request->id);
            return response()->json([
                'message'=> 'Registro atualizado com sucesso',
                'status'=> 200,
                ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message'=> 'Erro ao atualizar o registro',
                'status'=> 500,
                ], 500);
        }
    }
    public function delete(string $id)
    {
        $this->service->destroy($id);

        return response()->json([], 204);
    }

    public function getProjectByUserId(string $id, string $project_id) {
        
        try {
            $data = $this->service->getProjectByUserId($id, $project_id);
            return response()->json([
                'data'=> $data,
            ]);

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        } 
    }


    public function getUserProjects(string $id) {

        try {
            $data = $this->service->getUserProjects($id);
            return response()->json([
                'data'=> $data,
            ]);

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        } 
    }

    public function confirmUserProject(string $id_user, string $project_id) {
        $user = $this->service->confirmProject($id_user, $project_id);

        return response()->json([
            'message' => 'Email confirmado com sucesso',
            'user' => $user,
            'status' => 200
        ], 200);
    }

    public function inviteMailsForProject(Request $request, string $id) {
        $data = $request->all();
        $this->service->inviteMailsForProject($data, $id);

        return response()->json([
            'message' => 'Emails enviados com sucesso',
            'status' => 200
        ], 200);
    }
}
