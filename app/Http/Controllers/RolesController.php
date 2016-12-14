<?php

namespace PopTroco\Http\Controllers;

use Illuminate\Http\Request;

use PopTroco\Http\Requests;
use PopTroco\Http\Controllers\Controller;
use PopTroco\Http\Requests\RoleRequest;
use PopTroco\Repositories\RoleRepository;

class RolesController extends Controller
{
    /**
     * @var RoleRepository
     */
    private $repository;

    function __construct(RoleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $roles = $this->repository->paginate();

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(RoleRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.roles.index');
    }

    public function edit($id)
    {
        $role = $this->repository->find($id);

        return view('admin.roles.edit', compact('role'));
    }

    public function update(RoleRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data, $id);

        return redirect()->route('admin.roles.index');
    }
}
