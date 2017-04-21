<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tag::paginate();
    }

    /**
     * @param Request $request
     * @param Tag $tag
     * @return mixed
     */
    public function products(Request $request, Tag $tag) {
        return $tag->products;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Tag::create(request()->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag $tag
     * @return Tag
     */
    public function show(Tag $tag)
    {
        return $tag;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TagRequest|Request $request
     * @param  \App\Tag $tag
     * @return Tag
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $this->authorize('update', $tag);

        $tag->update(request()->all());
        return $tag;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $this->authorize('delete', $tag);

        $tag->delete();
        return $tag;
    }
}
