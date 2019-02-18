<?php

namespace App\Http\Controllers;

use App\Helpers\Contracts\ProductCreator;
use App\Helpers\Contracts\ProductRemover;
use App\Helpers\Contracts\ProductUpdater;
use App\Helpers\ProductsSort\getOrdersMaker;
use App\Helpers\ProductsSort\SortMaker\CategoryMaker;
use App\Helpers\ProductsSort\SortMaker\PriceBeginEndMaker;
use App\Helpers\ProductsSort\Sorts\PriceBeginEndSort;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{

    public function __construct() {

        $this->middleware('jwt')->except('index','show', 'sort');
        $this->middleware('cors');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index() {

        return response([

            'data' => ProductCollection::collection(Product::paginate(25))
        ], Response::HTTP_OK);
    }

    public function sort(Request $request) {

        $maker = getOrdersMaker::getMaker($request);
        $sort = $maker->crateSort();

        return response([

            'data' => $sort->getDataAfterSort($request)
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, ProductCreator $creator) {

        return response([

            'data' => $creator::createProduct($request)
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return ProductResource
     */
    public function show(Product $product) {

        return response([

            'data' => new ProductResource($product)
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product, ProductUpdater $updater)
    {
        return response([

            'data' => $updater::updateProduct($request, $product)
        ], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, ProductRemover $remover) {

        $remover::removeProductWithDependencies($product);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
