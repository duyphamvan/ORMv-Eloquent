<?php

use App\Blog;
use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blog = new Blog();
        $blog->id   = 1;
        $blog->image = 'anh-bia-facebook-10-768x512.jpg';
        $blog->title = "Blog 1";
        $blog->content  = "customer1@codegym.vn";
        $blog->author  = "customer1@codegym.vn";
        $blog->due_date = "2020-10-10";
        $blog->category_id  = 1;
        $blog->save();
    }
}
