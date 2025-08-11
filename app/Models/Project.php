<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = "project";

    protected $fillable = [
        "name", "description", "dt_start", "dt_end", "active"];

    #definir regras para esse model
    #user rules
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'dt_start' => 'required',
            'active' => 'required',
        ];
    }

    public function feedback()
    {
        return [
            'name' => 'O campo :attribute é obrigatório',
            'description' => 'O campo :attribute é obrigatório',
            'dt_start' => 'O campo :attribute é obrigatório',
            'active' => 'O campo :attribute é obrigatório'
        ];
    }
}
