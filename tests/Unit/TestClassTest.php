<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\TestClass;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class TestClassTest extends TestCase
{
    public function test_cannot_create_without_accepting_term()
    {
        $this->expectException(ValidationException::class);

        TestClass::create([
            'name' => 'Turma Unit',
            'institution' => 'X',
            'method_id' => 1,
            'term' => false,
            'expire_date' => '2000-01-01',
            'user_id' => 1,
            'url' => Str::uuid()->toString(),
        ]);
    }
}