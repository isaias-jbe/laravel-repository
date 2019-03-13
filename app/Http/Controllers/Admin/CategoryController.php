<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateCategoryFormRequest;
use App\Http\Requests\UpdateCategoryFormRequest;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    protected $table = 'categories';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table("{$this->table}")->orderBy('id', 'desc')->paginate();

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
    public function store(StoreUpdateCategoryFormRequest $request)
    {
        DB::table("{$this->table}")->insert([
            'title'         => $request->title,
            'url'           => $request->url,
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
        $category = DB::table("{$this->table}")->where('id', $id)->first();

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
        $category   = DB::table("{$this->table}")->where('id', $id)->first();
        
        if(!$category)
            return redirect()->back();

        return view('admin.categories.create', compact('category', 'title'));
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
        $category = DB::table("{$this->table}")
                ->where('id', $id)
                ->update([
                    'title'         => $request->title,
                    'url'           => $request->url,
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
        DB::table("$this->table")->where('id', $id)->delete();

        return redirect()->route('categories.index');
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
        $data = $request->except('_token');
        
        /*
        $categories = DB::table("{$this->table}")
                        ->where('title', $search)
                        ->orWhere('url', $search)
                        ->orWhere('description', 'LIKE', "%{search}%")
                        ->get();
        */

        $categories = DB::table("{$this->table}")
                    ->where( function ($query) use ($data) {
                        if( isset($data['title']) ){
                            $query->where('title', $data['title']);
                        }

                        if( isset($data['url']) ){
                            $query->orWhere('url', $data['url']);
                        }

                        if( isset($data['description']) ){
                            $description = $data['description'];
                            $query->orWhere('description', 'LIKE', "%{$description}%");
                        }
                    })->orderBy('id', 'desc')->paginate();

        return view('admin.categories.index', compact('categories', 'data'));
    }
}
