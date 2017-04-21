<?php
namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::paginate();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest|Request $request
     * @return \App\Category
     */
    public function store(CategoryRequest $request)
    {
        return Category::create(request()->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \App\Category
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest|Request $request
     * @param  \App\Category $category
     * @return Category
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $this->authorize('update', $category);

        $category->update(request()->all());
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return Category
     */
    public function destroy(Category $category)
    {
        $this->authorize('delete', $category);

        $category->delete();
        return $category;
    }
}
