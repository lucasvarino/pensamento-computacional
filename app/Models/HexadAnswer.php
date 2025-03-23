<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HexadAnswer extends Model
{
    use HasFactory;

    protected $fillable = ['answer_id', 'question_id', 'group_id', 'value'];

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
