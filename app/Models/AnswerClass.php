<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerClass extends Model
{
    use HasFactory;
    protected $table = 'answers_classes';

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

    public function classe()
    {
        return $this->belongsTo(\App\Models\TestClass::class, 'class_id', 'id');
    }

    public function answerOption()
    {
        return $this->belongsTo(AnswerOption::class);
    }
}
