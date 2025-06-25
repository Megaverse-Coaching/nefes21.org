<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $users = Admin::with(['info:admin_id,avatar'])->whereNot('id', '=', 801000)->get();

        return view('admin.users.index', compact('users'));
    }

    public function getUserList(Admin $model)
    {
        $data = $model::select('id', 'first_name', 'last_name', 'email', 'created_at')->get();
        //        $data = $model::all()->toJson(JSON_PRETTY_PRINT);
        return DataTables::of($data)->addIndexColumn()->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create(): void
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request): Response
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Collection|Model|Admin|Admin[]
     */
    public function show($id): Admin|array|Collection|Model
    {
        $config = theme()->getOption('page');

        return Admin::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Collection|Model|Admin|Admin[]
     */
    public function edit($id): Admin|array|Collection|Model
    {
        $config = theme()->getOption('page', 'edit');

        return Admin::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     *
     * @return Response
     */
    public function update(Request $request, $id): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id): void
    {
        $usr = Admin::find($id);
        $usr->delete();
    }
}
