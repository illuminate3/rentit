<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Item;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['indefinite', 'lenses', 'drones', 'cameras', 'equipment'] as $name) {
            Category::create([
                'name' => $name,
                'slug' => str_slug($name)
            ]);
        }
        
        factory(User::class, 10)->create()->each(function ($user) {
            factory(Item::class, 10)->make()->each(function ($item) use ($user) {
                $item->user()->associate($user);
                $item->category()->associate(Category::all()->random());
                $item->save();
            });
        });

    }
}
