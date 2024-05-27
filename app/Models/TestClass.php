<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
