<?php

namespace Tests\Unit\Models\Categories;

use Tests\TestCase;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;

class CategoryTest extends TestCase
{
    /** @test */
    public function it_has_many_children()
    {
        $category = factory(Category::class)->create();

        $category->children()->save(
            factory(Category::class)->create()
        );

        $this->assertInstanceOf(Collection::class, $category->children);
        $this->assertInstanceOf(Category::class, $category->children->first());
    }

    /** @test */
    public function it_can_fetch_only_parents()
    {
        $category = factory(Category::class)->create();

        $category->children()->save(
            factory(Category::class)->create()
        );

        $this->assertEquals(1, Category::parents()->count());
    }

    /** @test */
    public function it_is_ordered_by_a_numbered_order()
    {
        $category = factory(Category::class)->create([
            'order' => 2
        ]);

        $anotherCategory = factory(Category::class)->create([
            'order' => 1
        ]);

        $this->assertEquals($anotherCategory->name, Category::ordered()->first()->name);
    }


    public function test_it_belongs_to_many_products()
    {
        $category = factory(Category::class)->create();

        $category->products()->save(
            factory(Product::class)->create()
        );

        $this->assertInstanceOf(Product::class, $category->products->first());
    }
}
