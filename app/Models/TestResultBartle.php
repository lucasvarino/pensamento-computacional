<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class TestResultBartle extends Model
{
    use Sushi;

    protected $rows = [
        [
            'name' => '',
            'age' => '',
            'Empreendedor' => '',
            'Socializador' => '',
            'Explorador' => '',
            'Assassino' => '',
        ]
    ];
}
