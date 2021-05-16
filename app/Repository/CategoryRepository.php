<?php 
namespace App\Repository;

use App\Models\Category;
use Carbon\Carbon;

class CategoryRepository {
    CONST CACHE_KEY = 'CATEGORIES';

    public function all()
    {
        $cacheKey = self::CACHE_KEY . strtoupper("all");

        return cache()->remember($cacheKey , Carbon::now()->addHour(1), function () {
            return Category::all();
        });
    }
}