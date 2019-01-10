<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories= factory(Category::class)->times(4)->make();
        Category::insert($categories->toArray());

        $category = Category::find(1);
        $category->name = '分享';
        $category->description='分享创造，分享发现';
        $category->save();

        $category = Category::find(2);
        $category->name = '回答';
        $category->description='用户问答相关的帖子';
        $category->save();

        $category = Category::find(3);
        $category->name = '教程';
        $category->description='教程相关文章';
        $category->save();

        $category = Category::find(4);
        $category->name = '公告';
        $category->description='站点公告类型的帖子';
        $category->save();

    }
}
