<?php

namespace App\Models;

class Post_test
{
    private static $blog_posts = [
        [
            "title" => "Judul Pertama",
            "slug"=>"judul-post-pertama",
            "author" => "Sandika Galih",
            "post" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt porro quaerat optio, nulla ut id illo distinctio at natus, laborum dignissimos obcaecati fugiat sit saepe exercitationem architecto reiciendis repellat itaque deserunt placeat cupiditate autem. Eum possimus quos atque soluta veniam in obcaecati culpa sequi non consequatur dolorum, at, dolores aliquam unde debitis nisi fugit necessitatibus. Rem quae, perferendis distinctio dolorem qui adipisci laudantium? Explicabo, in fuga. Ad eos a nemo unde error harum minima doloribus perferendis expedita cumque, sunt eum."
        ],
        [
            "title" => "Judul Kedua",
            "slug"=>"judul-post-kedua",
            "author" => "Jantuar Silaban",
            "post" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur non iusto rem praesentium quae id inventore at deserunt eaque maiores alias atque nostrum totam laboriosam debitis, recusandae unde, suscipit dolorum soluta, aspernatur porro veritatis. Nisi ullam mollitia asperiores excepturi et distinctio autem repellat eligendi ipsum molestiae officiis dignissimos, pariatur itaque deleniti eius minima? Laborum expedita ipsum excepturi repellendus, illum blanditiis tenetur iure nulla accusantium obcaecati veritatis in quaerat corrupti ex quam odit aperiam esse! Dignissimos modi tempore ab et similique libero cupiditate nostrum architecto blanditiis perferendis at, facilis dolore odio est ad autem itaque! Molestiae recusandae sit reiciendis facere doloribus!"
        ]
    ];

    public static function all(){
        return collect(self::$blog_posts);
    }

    public static function find($slug){
        $posts = static::all();
        // mencari data yanng dimana key-nya sama dengan slug
        $newPost=$posts->firstWhere('slug', $slug);
        return $newPost;
    }
}