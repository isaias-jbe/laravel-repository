<?php

namespace App\Http\Controllers\Admin;


use DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryFormRequest;
use App\Http\Requests\UpdateCategoryFormRequest;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    protected $repository;

    public function __construct(CategoryRepositoryInterface $repository)
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
        $categories = $this->repository->paginate();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Cadastro de Categoria";

        return view('admin.categories.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateCategoryFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryFormRequest $request)
    {
        $this->repository->store([
            'name'          => $request->name,
            'description'   => $request->description
        ]);

        return redirect()->route('categories.index')->withSuccess('Cadastro realizado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->repository->findById($id);

        if(!$category)
            return redirect()->back();

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title      = "Editar Categoria: ";
        $category = $this->repository->findById($id);
        
        if(!$category)
            return redirect()->back();

        return view('admin.categories.edit', compact('category', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdateCategoryFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryFormRequest $request, $id)
    {
        $this->repository->update($id, [
                    'name'          => $request->name,
                    'description'   => $request->description
                ]);

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ( $this->repository->countProductsByCategoryId($id) > 0 )
            return redirect()->route('categories.index')->with('message', 'Não pode deletar! Existe produto(s) vinculado(s) a está categoria.');

        $this->repository->destroy($id);

        return redirect()->route('categories.index')->with('success', 'Categoria deletada com sucesso!');
    }

    /**
     * Search categories
     * 
     * @param int $id
     * @param string $title
     * @param string $url
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $categories = $this->repository->search($request);

        return view('admin.categories.index', compact('categories', 'filters'));
    }
}
