<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class HexadResult extends Model
{
    use HasFactory;

    protected $fillable = ['answer_id', 'group_id', 'value'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

    /**
     * Formata o resultado do HEXAD para exibição
     */
    public static function formatTestResult(Collection $result): Collection
    {
        return $result->map(function (HexadResult $result) {
            return [
                'group' => $result->group->name,
                'value' => $result->value,
                'description' => $result->group->description,
            ];
        });
    }
}
