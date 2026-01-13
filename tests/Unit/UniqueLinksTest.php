<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Str;

class UniqueLinksTest extends TestCase
{
    public function test_generates_1000_unique_links()
    {
        $links = [];
        for ($i = 0; $i < 1000; $i++) {
            $links[] = Str::uuid()->toString();
        }

        $this->assertCount(1000, $links);
        $this->assertCount(1000, array_unique($links));
    }
}
