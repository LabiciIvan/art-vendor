<?php

namespace Tests\Unit;

use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_make_item(): void
    {
        $item = Item::factory()->make();

        $this->assertInstanceOf(Item::class, $item);
    }
}
