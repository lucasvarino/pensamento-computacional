<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    public function answersClasses()
    {
        return $this->hasMany(AnswerClass::class);
    }

    public function bartleResults()
    {
        return $this->hasMany(BartleResult::class);
    }

    public function method()
    {
        return $this->belongsTo(Method::class);
    }
}
