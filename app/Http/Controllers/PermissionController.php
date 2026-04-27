<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::orderBy('id' , 'desc')->paginate(10);
return response()->view('cms.spatie.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return response()->view('cms.spatie.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validator = Validator($request->all() , [
            
        ]);

        if (! $validator->fails()){
            $permissions = new Permission();
            $permissions->name = $request->get('name');
         $permissions->guard_name = $request->get('guard_name');
         $isSaved = $permissions->save();
         return response()->json([
            'icon' => 'success' ,
            'title' => 'stored is Successfully',
        ] , 200);

        }
        else{
             return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $permissions = Permission::findOrFail($id);
         return response()->view('cms.spatie.permission.show',compact('permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permissions = Permission::findOrFail($id);
        return response()->view('cms.spatie.permission.edit' , compact('permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validator = Validator($request->all() , [
            
        ]);

        if (! $validator->fails()){
            $permissions = Permission::findOrFail($id);
            $permissions->name = $request->get('name');
         $permissions->guard_name = $request->get('guard_name');
         $isSaved = $permissions->save();
      
            return['redirect'=>route('permissions.index')];
        }
        else{
             return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permissions = Permission::destroy($id);
    }
}