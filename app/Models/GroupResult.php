<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class GroupResult extends Model
{
    use HasFactory;
    use Sushi;

    protected $rows = [
        [
            'nome' => 'Lucas V.',
            'achiever' => 66.67,
            'explorer' => 73.33,
            'killer' => 33.33,
            'socializer' => 26.67,
            'predominante' => 'explorer'
        ],
        [
            'nome' => 'Ana S.',
            'achiever' => 80.00,
            'explorer' => 40.00,
            'killer' => 60.00,
            'socializer' => 20.00,
            'predominante' => 'achiever'
        ],
        [
            'nome' => 'Carlos R.',
            'achiever' => 60.00,
            'explorer' => 70.00,
            'killer' => 20.00,
            'socializer' => 50.00,
            'predominante' => 'explorer'
        ],
        [
            'nome' => 'Mariana L.',
            'achiever' => 30.00,
            'explorer' => 50.00,
            'killer' => 70.00,
            'socializer' => 40.00,
            'predominante' => 'killer'
        ],
        [
            'nome' => 'Pedro M.',
            'achiever' => 50.00,
            'explorer' => 60.00,
            'killer' => 40.00,
            'socializer' => 30.00,
            'predominante' => 'explorer'
        ],
        [
            'nome' => 'Camila F.',
            'achiever' => 70.00,
            'explorer' => 30.00,
            'killer' => 50.00,
            'socializer' => 50.00,
            'predominante' => 'achiever'
        ],
        [
            'nome' => 'Rodrigo C.',
            'achiever' => 40.00,
            'explorer' => 20.00,
            'killer' => 80.00,
            'socializer' => 30.00,
            'predominante' => 'killer'
        ],
        [
            'nome' => 'Isabela M.',
            'achiever' => 50.00,
            'explorer' => 70.00,
            'killer' => 30.00,
            'socializer' => 50.00,
            'predominante' => 'explorer'
        ],
        [
            'nome' => 'Rafaela B.',
            'achiever' => 60.00,
            'explorer' => 40.00,
            'killer' => 50.00,
            'socializer' => 60.00,
            'predominante' => 'socializer'
        ],
        [
            'nome' => 'Bruno C.',
            'achiever' => 70.00,
            'explorer' => 20.00,
            'killer' => 60.00,
            'socializer' => 40.00,
            'predominante' => 'achiever'
        ],
        [
            'nome' => 'Juliana F.',
            'achiever' => 40.00,
            'explorer' => 60.00,
            'killer' => 30.00,
            'socializer' => 70.00,
            'predominante' => 'socializer'
        ],
        [
            'nome' => 'Diego S.',
            'achiever' => 50.00,
            'explorer' => 40.00,
            'killer' => 70.00,
            'socializer' => 30.00,
            'predominante' => 'killer'
        ],
        [
            'nome' => 'Aline R.',
            'achiever' => 80.00,
            'explorer' => 30.00,
            'killer' => 50.00,
            'socializer' => 40.00,
            'predominante' => 'achiever'
        ],
        [
            'nome' => 'Fernando P.',
            'achiever' => 30.00,
            'explorer' => 50.00,
            'killer' => 40.00,
            'socializer' => 60.00,
            'predominante' => 'socializer'
        ],
        [
            'nome' => 'Carolina M.',
            'achiever' => 60.00,
            'explorer' => 50.00,
            'killer' => 30.00,
            'socializer' => 40.00,
            'predominante' => 'achiever'
        ],
        [
            'nome' => 'Renato C.',
            'achiever' => 40.00,
            'explorer' => 60.00,
            'killer' => 50.00,
            'socializer' => 20.00,
            'predominante' => 'explorer'
        ],
        [
            'nome' => 'Lucas M.',
            'achiever' => 70.00,
            'explorer' => 40.00,
            'killer' => 60.00,
            'socializer' => 30.00,
            'predominante' => 'achiever'
        ]
    ];

    public function test()
    {
        dd('passou');
    }
}
