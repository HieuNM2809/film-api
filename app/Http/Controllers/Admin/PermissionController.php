<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\GroupPermission;

class PermissionController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Permission();
        $this->table = "permission";
        $this->data = $this->model->withTrashed()->paginate($this->perPage);
        $this->controllerName = 'PermissionController';
    }

    public function index()
    {
        // return $this->data;
        return view($this->view . $this->table . '.home')->with([
            'controllerName' => $this->controllerName,
            'data' => $this->data,
            'table' => $this->table
        ]);
    }

    public function create()
    {
        $data = new GroupPermission();
        $dataForeign["groupPermission"] = $data->all();
        return view($this->view . $this->table . '.add')->with([
            'controllerName' => $this->controllerName,
            'table' => $this->table,
            'dataForeign' => $dataForeign
        ]);
    }

    public function store(Request $request)
    {
        // dữ liệu
        $param = $request->all();
        $param["view"] = $param["view"] ?? null;
        $param["view"] = $param["view"] == "on" ? 1 : 0;
        $param["create"] = $param["create"] ?? null;
        $param["create"] = $param["create"] == "on" ? 1 : 0;
        $param["edit"] = $param["edit"] ?? null;
        $param["edit"] = $param["edit"] == "on" ? 1 : 0;
        unset($param["_token"]);
        // create comment
        $create = insertTable($this->table . 's', $param);
        if ($create) {
            return redirect()->route($this->table . '.index');
        }
        return back()->withInput();
    }

    public function show($id, Request $request)
    {
        return $request;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = new GroupPermission();
        $dataForeign["groupPermission"] = $data->all();
        $data = $this->model->withTrashed()->find($id);
        return view($this->view . $this->table . '.edit')->with([
            'controllerName' => $this->controllerName,
            'data' => $data,
            'id' => $id,
            'table' => $this->table,
            'dataForeign' => $dataForeign
        ]);
    }

    public function update(Request $request, $id)
    {
        $param = $request->all();
        $param["view"] = $param["view"] ?? null;
        $param["view"] = $param["view"] == "on" ? 1 : 0;
        $param["create"] = $param["create"] ?? null;
        $param["create"] = $param["create"] == "on" ? 1 : 0;
        $param["edit"] = $param["edit"] ?? null;
        $param["edit"] = $param["edit"] == "on" ? 1 : 0;
        unset($param["_token"]);
        unset($param["_method"]);
        $update = updateTable($this->table . 's', $param, ['id' => $id]);
        if ($update) {
            return redirect()->route($this->table . '.index');
        }
        return back()->withInput();
    }

    public function destroy($id)
    {
        $data = $this->model->find($id);
        $data->delete();
        return redirect()->route($this->table . '.index');
    }
}
