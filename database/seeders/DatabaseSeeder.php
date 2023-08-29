<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Categories;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name'=>'James Silaban',
        //     'email'=>'james@gmail.com',
        //     'password'=>bcrypt('12345')
        // ]);

        // User::create([
        //     'name'=>'Genta Iris',
        //     'email'=>'genta@gmail.com',
        //     'password'=>bcrypt('12345')
        // ]);

        User::factory(5)->create();
        
        Categories::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Categories::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Categories::create([
            'name' => 'Personal',
            'slug' => 'personal'   
        ]);

        // Post::create([
        //     'title'=> 'Judul Post Pertama',
        //     'categories_id'=>1,
        //     'user_id'=>1,
        //     'slug'=>'post-pertama',
        //     'excerpt'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        //     'body'=>'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur recusandae sapiente et maxime voluptates exercitationem officiis vitae possimus, porro molestiae ea blanditiis odio numquam vel voluptate voluptatibus eius illum dolore molestias corporis architecto, ad, amet quasi sunt!</p> <p>Molestiae atque repellendus odit neque blanditiis molestias, repudiandae iusto tempore eveniet quas quia officia impedit doloremque aperiam? Vitae asperiores incidunt tenetur quam non laudantium reiciendis sapiente quisquam perspiciatis, saepe repudiandae in corporis fugiat accusantium voluptas alias.</p> <p>Incidunt officia tempora amet ea nam laudantium fuga ut odit nulla perspiciatis magni illo, fugiat aut rem, doloribus vel mollitia dignissimos aperiam recusandae commodi veritatis dolores nobis soluta? Accusantium dignissimos natus iusto, rem inventore dolorem, amet sed quidem autem facilis ipsam soluta adipisci aspernatur quos reprehenderit qui.</p>'
        // ]);
        
        // Post::create([
        //     'title'=> 'Judul Post Kedua',
        //     'slug'=>'post-kedua',
        //     'categories_id'=>1,
        //     'user_id'=>1,
        //     'excerpt'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        //     'body'=>'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur recusandae sapiente et maxime voluptates exercitationem officiis vitae possimus, porro molestiae ea blanditiis odio numquam vel voluptate voluptatibus eius illum dolore molestias corporis architecto, ad, amet quasi sunt!</p> <p>Molestiae atque repellendus odit neque blanditiis molestias, repudiandae iusto tempore eveniet quas quia officia impedit doloremque aperiam? Vitae asperiores incidunt tenetur quam non laudantium reiciendis sapiente quisquam perspiciatis, saepe repudiandae in corporis fugiat accusantium voluptas alias.</p> <p>Incidunt officia tempora amet ea nam laudantium fuga ut odit nulla perspiciatis magni illo, fugiat aut rem, doloribus vel mollitia dignissimos aperiam recusandae commodi veritatis dolores nobis soluta? Accusantium dignissimos natus iusto, rem inventore dolorem, amet sed quidem autem facilis ipsam soluta adipisci aspernatur quos reprehenderit qui.</p>'
        // ]);
        
        // Post::create([
        //     'title'=> 'Judul Post Ketiga',
        //     'slug'=>'post-ketiga',
        //     'user_id'=>1,
        //     'excerpt'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        //     'body'=>'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur recusandae sapiente et maxime voluptates exercitationem officiis vitae possimus, porro molestiae ea blanditiis odio numquam vel voluptate voluptatibus eius illum dolore molestias corporis architecto, ad, amet quasi sunt!</p> <p>Molestiae atque repellendus odit neque blanditiis molestias, repudiandae iusto tempore eveniet quas quia officia impedit doloremque aperiam? Vitae asperiores incidunt tenetur quam non laudantium reiciendis sapiente quisquam perspiciatis, saepe repudiandae in corporis fugiat accusantium voluptas alias.</p> <p>Incidunt officia tempora amet ea nam laudantium fuga ut odit nulla perspiciatis magni illo, fugiat aut rem, doloribus vel mollitia dignissimos aperiam recusandae commodi veritatis dolores nobis soluta? Accusantium dignissimos natus iusto, rem inventore dolorem, amet sed quidem autem facilis ipsam soluta adipisci aspernatur quos reprehenderit qui.</p>',
        //     'categories_id'=>2
        // ]);

        // Post::create([
        //     'title'=> 'Judul Post Keempat',
        //     'slug'=>'post-keempat',
        //     'user_id'=>2,
        //     'excerpt'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        //     'body'=>'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur recusandae sapiente et maxime voluptates exercitationem officiis vitae possimus, porro molestiae ea blanditiis odio numquam vel voluptate voluptatibus eius illum dolore molestias corporis architecto, ad, amet quasi sunt!</p> <p>Molestiae atque repellendus odit neque blanditiis molestias, repudiandae iusto tempore eveniet quas quia officia impedit doloremque aperiam? Vitae asperiores incidunt tenetur quam non laudantium reiciendis sapiente quisquam perspiciatis, saepe repudiandae in corporis fugiat accusantium voluptas alias.</p> <p>Incidunt officia tempora amet ea nam laudantium fuga ut odit nulla perspiciatis magni illo, fugiat aut rem, doloribus vel mollitia dignissimos aperiam recusandae commodi veritatis dolores nobis soluta? Accusantium dignissimos natus iusto, rem inventore dolorem, amet sed quidem autem facilis ipsam soluta adipisci aspernatur quos reprehenderit qui.</p>',
        //     'categories_id'=>2
        // ]);

        Post::factory(20)->create();
    }
}
