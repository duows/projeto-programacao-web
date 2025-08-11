<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalUser extends Model
{
    use HasFactory;

    protected $table = "personal_user";

    protected $fillable = [
        "name", "email", "password", "dt_created" ];

    #definir regras para esse model
    #user rules
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required | unique:personal_user',
            'password' => 'required'
            // 'dt_created' => 'required'
        ];
    }

    public function feedback()
    {
        return [
            'name' => 'O campo :attribute é obrigatório',
            'email' => 'O campo :attribute é obrigatório',
            'password' => 'O campo :attribute é obrigatório'
            // 'dt_created' => 'O campo :attribute é obrigatório'
        ];
    }
}
