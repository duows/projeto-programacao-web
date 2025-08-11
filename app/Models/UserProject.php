<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProject extends Model
{
    use HasFactory;

    protected $table = "user_project";
    protected $fillable = [
        'personal_user_id',
        'is_owner',
        'project_id',
        'dt_admission',
        'confirmed'
    ];

    public function rules()
    {
        return [
            'personal_user_id' => 'required',
            'project_id' => 'required',
            'is_owner'=> 'required',
            'dt_admission' => 'required',
        ];
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function personalUser()
    {
        return $this->belongsTo(PersonalUser::class);
    }

    // public function permission()
    // {
    //     return $this->belongsTo(Permission::class);
    // }

    public function feedback()
    {
        return [
            'dt_admission' => 'O campo ::attribute é obrigatório',
            'permission_id' => 'O campo ::attribute é obrigatório',
            'is_owner' => 'o campo ::attribute é obrigatório',
            'user_id' => 'O campo ::attribute é obrigatório',
            'project_id' => 'O campo ::attribute é obrigatório',
        ];
    }
}
