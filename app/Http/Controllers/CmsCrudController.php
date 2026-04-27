<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CmsCrudController extends Controller
{
    protected string $model;
    protected string $route;
    protected string $title;
    protected array $fields = [];

   public function index()
{
    $data = $this->model::all();

    return view('cms.crud.index', [
        'data' => $data,
        'title' => $this->title,
        'route' => $this->route,
        'fields' => $this->fields,
    ]);
}

    public function create()
    {
        return view('cms.crud.create');
    }

    public function store(Request $request)
    {
        $this->model::create($request->all());
        return redirect()->route($this->route.'.index');
    }

    public function edit($id)
    {
        $item = $this->model::findOrFail($id);
        return view('cms.crud.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = $this->model::findOrFail($id);
        $item->update($request->all());
        return redirect()->route($this->route.'.index');
    }

    public function destroy($id)
    {
        $item = $this->model::findOrFail($id);
        $item->delete();
        return back();
    }
}