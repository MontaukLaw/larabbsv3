<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Topic;

class CategoriesController extends Controller
{
    //
    public function index()
    {
        $categories = Category::paginate(10);
        //dd($categories);
        return view('categories.index', compact('categories'));
    }

    public function show(Category $category, Request $request, Topic $topic)
    {
        // 读取分类 ID 关联的话题，并按每 20 条分页
        $topics = $topic->withOrder($request->order)
            ->where('category_id', $category->id)
            ->paginate(20);

        // 传参变量话题和分类到模板中
        return view('topics.index', compact('topics', 'category'));

    }
}
