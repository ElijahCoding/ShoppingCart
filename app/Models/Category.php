<?php

namespace App\Models;

use App\Models\Traits\IsOrderable;
use App\Models\Traits\HasChildren;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    use HasChildren;
    use IsOrderable;

    protected $guarded = [];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}
