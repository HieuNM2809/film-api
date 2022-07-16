<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Models\Organization;

class OrganizationController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Organization();
        $this->table = "organization";
        $this->data = $this->model->withTrashed()->paginate($this->perPage);
        $this->controllerName = 'OrganizationController';
    }

    public function index()
    {
        return view($this->view . $this->table . '.home')->with([
            'controllerName' => $this->controllerName,
            'data' => $this->data,
            'table' => $this->table
        ]);
    }

    public function create()
    {
        return view($this->view . $this->table . '.add')->with([
            'controllerName' => $this->controllerName,
            'table' => $this->table
        ]);
    }

    public function store(Request $request)
    {
        // dữ liệu
        $param = $request->all();
        unset($param["_token"]);
        // upload avatar
        if ($request->image) {
            $name = uploadImage($request, 'image', $this->table);
            if (!$name) {
                return back()->withInput();
            }
        }
        $param['image'] = $name ?? "";
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
        $data = $this->model->withTrashed()->find($id);
        return view($this->view . $this->table . '.edit')->with([
            'controllerName' => $this->controllerName,
            'data' => $data,
            'id' => $id,
            'table' => $this->table
        ]);
    }

    public function update(Request $request, $id)
    {
        $param = $request->all();
        // return $param;
        unset($param["_token"]);
        unset($param["_method"]);
        // upload avatar
        try{
            if ($request->image) {
                $name = uploadImage($request, 'image', $this->table);
                if (!$name) {
                    return back()->withInput();
                }
            }
        }catch(Exception $e)
        {}

        $param['image'] = $name ?? "";
        if (!$param['image']) {
            unset($param['image']);
        }
        // return $param;
        $update = updateTable($this->table . 's', $param, ['id' => $id]);
        if ($update) {
            return redirect()->route($this->table . '.index');
        }
        return back()->withInput();
    }

    public function destroy(Request $request, $id)
    {
        $data = $this->model->find($id);
        if($data){
            $data->delete();
        }
        return redirect()->route($this->table . '.index');
    }
}
