<?php

namespace App\Services\Base;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class AbstractService implements ServiceInterface
{
    protected $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function index($pesquisar, $page) {
        $registros = $this->repository->paginate($page);
        return ([
            "registros"=>$registros,
        ]);
    }
    
    public function store($request) {
        DB::beginTransaction();
    
        try {
            $registro = $this->repository->create($request);
            DB::commit();
            return $registro;
        } catch (Exception $e) {     
            DB::rollBack();
            throw new \Exception('Erro ao criar o registro: ' . $e->getMessage(), $e->getCode(), $e);
        }
    }
    
    public function show($id) {
        try {
            $registro = $this->repository->find($id);
            return $registro;
        } catch (ModelNotFoundException $e) {
            throw new Exception('Registro não encontrado.');
        }
    }
    
    public function update($request, string $id) {
        try {
            $data = $this->repository->find($id);
    
            DB::beginTransaction();
            $registro = $data->update($request);
            DB::commit();
            return $registro;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception('Erro ao atualizar o registro: ' . $e->getMessage());
        }
    }

    public function destroy($id) {
        $data = $this->show($id);

        DB::beginTransaction();
        try {
            $data->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception('Erro ao excluir o registro: ' . $e->getMessage());
        }
    }


}
