<?php
namespace App\Http\Controllers;

use App\Http\Requests\ProductFilterRequest;
use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::paginate();
    }

    /**
     * @param ProductFilterRequest|\Illuminate\Http\Request $request
     * @return mixed
     */
    public function filter(ProductFilterRequest $request) {
        $products = Product::query();

        if ($request->has('title')) $products->where('title', 'LIKE', '%' . $request->input('title') . '%');
        if ($request->has('description')) $products->where('description', 'LIKE', '%' . $request->input('description') . '%');
        if ($request->has('price_min')) $products->where('price', '>=', $request->input('price_min'));
        if ($request->has('price_max')) $products->where('price', '<=', $request->input('price_max'));

        return $products->get();
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
     * @param  \App\Http\Requests\ProductRequest  $request
     * @return \App\Product
     */
    public function store(ProductRequest $request)
    {
        $product = new Product($request->all());
        $this->handlePhoto($request, $product);

        return Auth::guard('api')->user()->products()->save($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product $product
     * @return Product
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param  \App\Product $product
     * @return Product
     */
    public function update(ProductRequest $request, Product $product)
    {
        $this->authorize('update', $product);

        $this->handlePhoto($request, $product);
        $product->update($request->input());

        return $product;
    }

    /**
     * Handles photo upload and setting photo field to product model
     *
     * @param ProductRequest $request
     * @param Product $product
     */
    private function handlePhoto(ProductRequest $request, Product $product) {
        if ($request->file('photo')) {
            $path = $request->file('photo')->store('photos');
            if ($path) $product->photo = $path;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $product
     * @return Product
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);

        $product->delete();
        return $product;
    }
}
