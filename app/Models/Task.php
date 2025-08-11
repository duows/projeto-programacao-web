<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = "task";

    protected $fillable = [
        "card_id", "description", "status_task", "weight",
        "dt_start", "dt_end", "dead_line"];

    #definir regras para esse model
    #user rules
    public function rules()
    {
        return [
            'card_id' => 'required',
            'description' => 'required',
            'weight'=> 'required',
            'status_task'=> 'required',
            'dtStart' => 'required',
            'dtEnd' => 'required',
            'deadLine' => 'required',
        ];
    }

    #1 card has many tasks
    public function card()
    {
        return $this->belongsTo(Card::class);
    } 

    // #1 task has 1 statusTask
    // public function statusTask()
    // {
    //     return $this->hasOne(StatusTask::class);
    // }

    // #1 task has 1 priority
    // public function priority()
    // {
    //     return $this->hasOne(Priority::class);
    // }

    public function feedback()
    {
        return [
            'card_id' => 'O campo :attribute é obrigatório',
            'description' => 'O campo :attribute é obrigatório',
            'status_task' => 'O campo :attribute é obrigatório',
            'weight' => 'O campo :attribute é obrigatório',
            'dtStart' => 'O campo :attribute é obrigatório',
            'dtEnd' => 'O campo :attribute é obrigatório',
            'deadLine' => 'O campo :attribute é obrigatório',
        ];
    }
}
