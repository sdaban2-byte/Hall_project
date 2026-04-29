<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\HallOwner;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class HallOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $hall_owners = HallOwner::withCount('halls')->orderBy('id', 'desc')->paginate(10);
        return response()->view('cms.hall_owner.index', compact('hall_owners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $cities = City::all();
        $roles = Role::where('guard_name', 'hall_owner')->get();
        return response()->view('cms.hall_owner.create', compact('cities', 'roles'));
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

            'password' => 'required',
            'email' => 'nullable',
            'company_name' => 'required',

        ], [
            'first_name.required' => 'This is required',
            'last_name.required' => 'This is required',
            'company_name.required' => 'This is required',
            'email.required' => 'This is required',

        ]);

        if ($validator->fails()) {

            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        } else {

            $hall_owners = new HallOwner();
            $hall_owners->email = $request->get('email');
            $hall_owners->password = $request->get('password');
            $hall_owners->company_name = $request->get('company_name');

            $isSaved = $hall_owners->save();
            if ($isSaved) {
                $users = new User();
                $role = Role::where('id', $request->role_id)
                    ->where('guard_name', 'admin')
                    ->firstOrFail();

                $hall_owners->assignRole($role->name);

                if (request()->hasFile('image')) {

                    $image = $request->file('image');
                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                    $image->move('storage/images/hall_owner', $imageName);
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
                $users->actor()->associate($hall_owners);
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
        $hall_owners = HallOwner::findOrFail($id);
        return response()->view('cms.hall_owner.show', compact('hall_owners', 'cities'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cities = City::all();
        $hall_owners = HallOwner::findOrFail($id);
        return response()->view('cms.hall_owner.edit', compact('hall_owners', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',

            'password' => 'required',
            'email' => 'nullable',
            'company_name' => 'required',

        ], [
            'first_name.required' => 'This is required',
            'last_name.required' => 'This is required',
            'company_name.required' => 'This is required',
            'email.required' => 'This is required',

        ]);

        if ($validator->fails()) {

            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        } else {

            $hall_owners =  HallOwner::findOrFail($id);
            $hall_owners->email = $request->get('email');
            $hall_owners->password = $request->get('password');
            $hall_owners->company_name = $request->get('company_name');

            $isSaved = $hall_owners->save();
            if ($isSaved) {
                $users =  $hall_owners->user;

                if (request()->hasFile('image')) {

                    $image = $request->file('image');
                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                    $image->move('storage/images/hall_owner', $imageName);
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
                $users->actor()->associate($hall_owners);
                $isSaved = $users->save();


                return response()->json([
                    'icon' => 'success',
                    'title' => 'Crearted is Successfully',
                    'redirect' => route('hall_owners.index')

                ], 200);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hall_owners = HallOwner::destroy($id);
    }
}
