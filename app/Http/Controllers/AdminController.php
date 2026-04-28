<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $admins = Admin::with('user')->orderBy('id', 'desc')->paginate(10);

    return response()->view('cms.admin.index', compact('admins'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $cities = City::all();
        $roles = Role::where('guard_name' , 'admin')->get();
        return response()->view('cms.admin.create', compact('cities' , 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',

            'password' => 'required|string|min:6',
            'email' => 'nullable'

        ], [
            'first_name.required' => 'This is required',
            'last_name.required' => 'This is required',
            'password.required' => 'This is required',
            'email.required' => 'This is required',

        ]);

        if ($validator->fails()) {

            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        } else {

            $admins = new Admin();
            $admins->email = $request->get('email');
            $admins->password = $request->get('password');

            $isSaved = $admins->save();
            if ($isSaved) {
                $users = new User();
 $role = Role::findById($request->get('role_id'));

 $role = Role::where('id', $request->get('role_id'))->where('guard_name', 'admin')->first();

                if (request()->hasFile('image')) {

                    $image = $request->file('image');
                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                    $image->move('storage/images/admin', $imageName);
                    $users->image = $imageName;
                }

                $users->first_name = $request->input('first_name'); # لانه بكتب get is deprecated
                $users->last_name = $request->input('last_name');
                $users->mobile = $request->input('mobile');
                $users->address = $request->input('address');
                $users->gender = $request->input('gender');
                $users->date = $request->input('date');
                $users->status = $request->input('status');
                $users->city_id = $request->input('city_id');
                $users->actor()->associate($admins);
                $isSaved = $users->save();


                return response()->json([
                    'icon' => 'success',
                    'title' => 'Crearted is Successfully',
                ], 200);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cities = City::all();
        $admins = Admin::findOrFail($id);
        return response()->view('cms.admin.show', compact('admins', 'cities'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $admins = Admin::findOrFail($id);
        $cities = City::all();

        return response()->view('cms.admin.edit', compact('admins', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',

            'password' => 'required',
            'email' => 'nullable'

        ], [
            'first_name.required' => 'This is required',
            'last_name.required' => 'This is required',
            'password.required' => 'This is required',
            'email.required' => 'This is required',

        ]);

        if ($validator->fails()) {

            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        } else {

            $admins = Admin::findOrFail($id);
            $admins->email = $request->get('email');
            $admins->password = $request->get('password');
            // if ($request->password) {
            //     $admins->password = Hash::make($request->password);
            // }
            $isUpdate = $admins->save();
            if ($isUpdate) {
                $users =  $admins->user;
                if (request()->hasFile('image')) {

                    $image = $request->file('image');
                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                    $image->move('storage/images/admin', $imageName);
                    $users->image = $imageName;
                }

                $users->first_name = $request->input('first_name'); # لانه بكتب get is deprecated
                $users->last_name = $request->input('last_name');
                $users->mobile = $request->input('mobile');
                $users->address = $request->input('address');
                $users->gender = $request->input('gender');
                $users->date = $request->input('date');
                $users->status = $request->input('status');
                $users->city_id = $request->input('city_id');
                $users->actor()->associate($admins);
                $isUpdate = $users->save();

                return response()->json([
                    'icon' => 'success',
                    'title' => 'Updated successfully',
                    'redirect' => route('admins.index')
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $admins = Admin::destroy($id);
    }
}