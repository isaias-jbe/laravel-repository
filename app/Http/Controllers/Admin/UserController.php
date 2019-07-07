<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUserFormRequest;
use App\Http\Requests\UpdateUserFormRequest;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use http\Env\Request;

class UserController extends Controller
{

    protected $repository;

    /**
     * UserController constructor.
     * @param UserRepositoryInterface $repository
     */
    public function __construct(UserRepositoryInterface $repository)
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
        $users = $this->repository->orderBy('id')->paginate();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastro de Usuário';

        return view('admin.users.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserFormRequest $request)
    {
        $request['password'] = bcrypt($request->input('password'));
        $this->repository->store($request->all());

        return redirect()->route('users.index')->withSuccess('Usuário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->repository->findWhereFirst('id', $id);

        if (!$user)
            return redirect()->back();

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Editar Usuário: ';
        $user = $this->repository->findById($id);

        if (!$user)
            return redirect()->back();

        return view('admin.users.edit', compact('title', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserFormRequest $request, $id)
    {
        $data = $request->all();

        if ($data['password'])
            $data['password'] = bcrypt($data['password']);
        else
            unset($data['password']);

        $this->repository->update($id, $data);

        return redirect(route('users.index'))->withSuccess('Usuário atualizado com sucesso!');
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

        return redirect()->route('users.index')->withSuccess('Usuário deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $filter = $request->except('_token');
        $users  = $this->repository->search($request);

        return view('admin.users.index', compact('users', 'filter'));
    }
}
