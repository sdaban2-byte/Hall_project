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
    $items = $this->model::paginate(10);

    $data = [
        'items' => $items,
        'title' => $this->title,
        'routeName' => $this->route,
        'fields' => $this->fields,
    ];

    if (method_exists($this, 'viewData')) {
        $data = array_merge($data, $this->viewData());
    }

    return view('cms.crud.index', $data);
}


   public function create()
{
    $data = [
        'title' => $this->title,
        'routeName' => $this->route,
        'fields' => $this->fields,
    ];

    if (method_exists($this, 'viewData')) {
        $data = array_merge($data, $this->viewData());
    }

    return view('cms.crud.create', $data);
}

 public function edit($id)
{
    $item = $this->model::findOrFail($id);

    $data = [
        'item' => $item,
        'title' => $this->title,
        'routeName' => $this->route,
        'fields' => $this->fields,
    ];

    if (method_exists($this, 'viewData')) {
        $data = array_merge($data, $this->viewData());
    }

    return view('cms.crud.edit', $data);
}

  public function update(Request $request, $id)
{
    $item = $this->model::findOrFail($id);
    $item->update($request->all());

    return redirect()->route($this->route . '.index');
}

public function destroy($id)
{
    $item = $this->model::findOrFail($id);
    $item->delete();

    return redirect()->route($this->route . '.index');
}

    public function store(Request $request)
{
    $this->model::create($request->all());

    return redirect()->route($this->route . '.index');
}

public function show($id)
{
    $item = $this->model::findOrFail($id);

    return view('cms.crud.show', [
        'item' => $item,
        'title' => $this->title,
        'routeName' => $this->route,
        'fields' => $this->fields,
    ]);
}

}