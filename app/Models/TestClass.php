<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Validator;

class TestClass extends Model
{
    use HasFactory;
    protected $table = 'classes';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function method()
    {
        return $this->belongsTo(Method::class);
    }

    protected static function booted(): void
    {
        static::creating(function ($model) {
            $data = [
                'term' => $model->term,
                'expire_date' => $model->expire_date,
            ];

            Validator::make($data, [
                'term' => ['accepted'],
                'expire_date' => ['nullable', 'date', 'after_or_equal:today'],
            ])->validate();
        });

        static::updating(function ($model) {
            $data = [
                'term' => $model->term,
                'expire_date' => $model->expire_date,
            ];

            Validator::make($data, [
                'term' => ['accepted'],
                'expire_date' => ['nullable', 'date', 'after_or_equal:today'],
            ])->validate();
        });
    }
}
