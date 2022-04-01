<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->addUsers();
        $this->addContent();
        $this->addConfigs();
    }

    /**
     * Add user
     */
    public function addUsers(): void
    {
        \DB::table('users')->delete();
        \App\Models\User::create(['email' => 'admin@admin.com', 'password' => '123456']);
    }

    /**
     * Add some content
     */
    public function addContent(): void
    {
        \DB::table('categories')->delete();
        \App\Models\Category::factory(5)->create();
        \DB::table('articles')->delete();
        \App\Models\Article::factory(40)->create();
        \DB::table('pages')->delete();
        \App\Models\Page::factory(1)->create([
            'parent_id' => null,
            'title' => 'About',
        ]);
    }

    /**
     * Add Config
     */
    public function addConfigs(): void
    {
        \DB::table('configs')->delete();
        \App\Models\Config::create(['key' => 'logo', 'content' => '']);
        \App\Models\Config::create(['key' => 'hero', 'content' => 1]);
        $footer = [
            'desc'=>'Sed varius enim lorem ullamcorper dolore aliquam aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin sed aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.',
            'email'=>'email@welcome.com',
            'phone' =>'(000) 000-0000',
            'address' => '1234 Somewhere Road #8254, Nashville, TN 00000-0000',
        ];
        \App\Models\Config::create(['key' => 'footer', 'content' => json_encode($footer)]);
        $socials = [
            'facebook_url'=>'https://facebook.com/',
            'twitter_url'=>'https://twitter.com/',
            'instagram_url' =>'https://instagram.com/',
        ];
        \App\Models\Config::create(['key' => 'socials', 'content' => json_encode($socials)]);

        \Cache::flush();
    }
}
