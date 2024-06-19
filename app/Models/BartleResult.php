<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BartleResult extends Model
{
    use HasFactory;

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

    public static function formatTestResult(Collection $result): Collection
    {
        return $result->map(function (BartleResult $result) {
            return [
                'group' => $result->group->name,
                'value' => $result->value,
                'description' => $result->group->description
            ];
        });
    }
}
