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

    return view('cms.crud.index', [
        'items' => $items,          
        'title' => $this->title,
        'routeName' => $this->route,
        'fields' => $this->fields,
    ]);
}

   public function create()
{
    return view('cms.crud.create', [
        'title' => $this->title,
        'routeName' => $this->route,
        'fields' => $this->fields,
    ]);
}

  public function edit($id)
{
    $item = $this->model::findOrFail($id);

    return view('cms.crud.edit', [
        'item' => $item,
        'title' => $this->title,
  'routeName' => $this->route,
          'fields' => $this->fields,
    ]);
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