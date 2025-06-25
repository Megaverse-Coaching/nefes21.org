<?php

namespace App\Http\Controllers\Admin\Permissions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateContentRequest;
use App\Models\Admin\Admin;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use http\Client\Response;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:create role|read role|update role|delete role']);
    }



    public function index(): Factory|View|Application
    {
        $panelRoles = Role::with('permissions')->withCount('users')->where('guard_name', 'admin')->whereNot('name', 'root')->get();
        $webRoles = Role::with('permissions')->withCount('users')->where('guard_name', 'web')->get();
        $allPermissions = Permission::all()->pluck('name');
        $perName = array();
        foreach ($allPermissions as $item)
        {
            $name = Str::of($item)->explode(' ');
            if(!in_array($name[1] , $perName)){
                $perName[] = $name[1];
            }
        }

        $selectedPermissions = Permission::all()->pluck('name', 'id')->toArray();

        return view('admin.roles.index', compact('panelRoles', 'webRoles', 'perName', 'selectedPermissions'));
    }

    /**
     * Show the form for creating a new resource.
     * @param Request $request
     *
     * @return void
     */
    public function create(Request $request): void
    {
        dd($request->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $valid = $request->validate(['name' => ['required', 'min:3']]);
        Role::create($valid);
        return to_route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $config = theme()->getOption('page');

        return Role::find($id);
    }


    public function edit($id): View|Factory|Application
    {
        if($id == 1) return abort(403);

        $role = Role::findOrFail($id);
        $permissions = $role->permissions;

        $users = Admin::role($role->name)
            ->with('info:admin_id,avatar')
            ->select('id', 'first_name', 'last_name', 'email', 'created_at')
            ->where('deleted_at', null)
            ->get();




        $allPermissions = Permission::all()->sortBy('order')->pluck('name');

        $perTitles = array();
        foreach ($allPermissions as $item)
        {
            $name = Str::of($item)->explode(' ');
            if(!in_array($name[1] , $perTitles)){
                $perTitles[] = $name[1];
            }
        }
        $selectedPermissions = $permissions->pluck('name', 'id')->toArray();

        return view('admin.roles.edit', compact('role', 'permissions', 'users', 'perTitles', 'selectedPermissions'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $role = Role::findOrFail($id);
        $role->update(['name' => $request->role_name]);
        $datas = $request->except('_method', '_token', 'role_name');

        extract($datas);
        $keys = array_keys($datas);
        $permissions = [];
        foreach ($keys as $name){
            if($name != "" || $name != null){
                foreach ($datas[$name] as $prm){
                    $permissions[] = Permission::findByName("$prm $name");
                }
            }
        }

        $role = Role::findOrFail($id);
        $role->syncPermissions($permissions);


        return response()->json([
            'success' => true,
            'message' => "Başarılı şekilde güncellendi."
        ], 201);

        //return redirect()->back()->with('success', true);

    }

}
