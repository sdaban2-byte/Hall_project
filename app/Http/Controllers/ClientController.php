<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clients = Client::orderBy('id', 'desc')->paginate(10);
        return response()->view('cms.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $cities = City::all();
        $roles = Role::where('guard_name', 'client')->get();

        return response()->view('cms.client.create', compact('cities', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'first_name' => 'required',
            'last_name'  => 'required',
            'password'   => 'required',
            'email'      => 'nullable',
        ], [
            'first_name.required' => 'This is required',
            'last_name.required'  => 'This is required',
            'password.required'   => 'This is required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        }

        $client = new Client();
        $client->email = $request->email;
        $client->password = $request->password;
        $client->save();

        $user = new User();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move('storage/images/client', $imageName);
            $user->image = $imageName;
        }

        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->mobile     = $request->mobile;
        $user->address    = $request->address;
        $user->gender     = $request->gender;
        $user->date       = $request->date;
        $user->status     = $request->status;
        $user->city_id    = $request->city_id;

        $user->actor()->associate($client);
        $user->save();

        return response()->json([
            'icon' => 'success',
            'title' => 'Created successfully',
        ], 200);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cities = City::all();
        $clients = Client::findOrFail($id);
        return response()->view('cms.client.show', compact('clients', 'cities'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $clients = Client::findOrFail($id);
        $cities = City::all();

        return response()->view('cms.client.edit', compact('clients', 'cities'));
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

            $clients = Client::findOrFail($id);
            $clients->email = $request->get('email');
            $clients->password = $request->get('password');
            // if ($request->password) {
            //     $clients->password = Hash::make($request->password);
            // }
            $isUpdate = $clients->save();
            if ($isUpdate) {
                $users =  $clients->user;
                if (request()->hasFile('image')) {

                    $image = $request->file('image');
                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                    $image->move('storage/images/client', $imageName);
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
                $users->actor()->associate($clients);
                $isUpdate = $users->save();

                return response()->json([
                    'icon' => 'success',
                    'title' => 'Updated successfully',
                    'redirect' => route('clients.index')
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
        $clients = Client::destroy($id);
    }
}
