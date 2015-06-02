<?php namespace Toomeowns\Ecommerce\Updates;

use October\Rain\Database\Updates\Seeder;
use Toomeowns\Ecommerce\Models\Category;

  class SeedAllTables extends Seeder
  {
    public function run()
    {
        Category::create([
          'name' => 'uncategorized',
          'slug' => 'uncategorized'
          ]);
    }
  }
