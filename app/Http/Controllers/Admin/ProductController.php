<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Requests\StoreProductFormRequest;
use App\Http\Requests\UpdateProductFormRequest;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    protected $repository;

    /**
     * ProductController constructor.
     * @param Product $product
     */
    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->repository->orderBy('id')->relationships('category')->paginate();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title      = 'Cadastro de Produto';

        return view('admin.products.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreProductFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductFormRequest $request)
    {
        $this->repository->store($request->all());

        return redirect()->route('products.index')->withSuccess('Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->repository->findWhereFirst('id', $id);

        if (!$product)
            return redirect()->back();

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title      = 'Editar Produto';
        $product    = $this->repository->findById($id);

        if (!$product)
            return redirect()->back();

        return view('admin.products.create', compact('title', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdateProductFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductFormRequest $request, $id)
    {
        $this->repository->update($id, $request->all());

        return redirect()->route('products.index')->withSuccess('Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->destroy($id);

        return redirect()->route('products.index')->withSuccess('Produto deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $filters    = $request->except('_token');
        $products   = $this->repository->search($request);

        return view('admin.products.index', compact('products', 'filters'));
    }
}
