<?php

namespace Tests\Feature\Categories;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryIndexTest extends TestCase
{
    public function test_it_returns_a_collection_of_categories()
    {
        $categories = factory(Category::class, 2)->create();

        $this->json('GET', 'api/categories')
             ->assertJsonFragment([
                'slug' => $categories->get(0)->slug
            ],[
                'slug' => $categories->get(1)->slug 
            ]);
    }
}
