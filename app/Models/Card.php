<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $table = "card";

    protected $fillable = [
        "project_id", "title", "description", "finished", "dt_finished", "dt_created"];


    public function project() {
        return $this->belongsTo(Project::class);
    }

    #definir regras para esse model
    #user rules
    public function rules()
    {
        return [
            'project_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'finished' => 'required',
            'dt_finished' => 'required',
            'dt_created' => 'required'
        ];
    }

    public function feedback()
    {
        return [
            'project_id' => 'O campo :attribute é obrigatório',
            'title' => 'O campo :attribute é obrigatório',
            'description' => 'O campo :attribute é obrigatório',
            'finished' => 'O campo :attribute é obrigatório',
            'dt_finished' => 'O campo :attribute é obrigatório',
            'dt_created' => 'O campo :attribute é obrigatório'
        ];
    }
}
