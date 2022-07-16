<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\TitleType;
use App\Models\User;
use App\Models\Organization;

class PostController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Post();
        $this->table = "post";
        $this->data = $this->model->withTrashed()->paginate($this->perPage);
        $this->controllerName = 'PostController';
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
        $data = new TitleType();
        $dataForeign["titleType"] = $data->all();
        $data = new User();
        $dataForeign["user"] = $data->all();
        $data = new Organization();
        $dataForeign["organization"] = $data->all();
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
        unset($param["_token"]);
        // upload avatar
        if ($request->image) {
            $name = uploadImage($request, 'image', $this->table);
            if (!$name) {
                return back()->withInput();
            }
        }
        $param['feature_image'] = $name ?? "";
        $param['number_bad_reports'] = 0;
        if ($param['image']) {
            unset($param['image']);
        }

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
        $data = new TitleType();
        $dataForeign["titleType"] = $data->all();
        $data = new User();
        $dataForeign["user"] = $data->all();
        $data = new Organization();
        $dataForeign["organization"] = $data->all();
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
        }catch(Exception $e){

        }

        try{
            if (isset($param['image'])) {
                unset($param['image']);
                $param['feature_image'] = $name ?? "";
            }
        }
        catch(Exception $e){

        }
        $update = updateTable($this->table . 's', $param, ['id' => $id]);
        if ($update) {
            return redirect()->route($this->table . '.index');
        }
        return back()->withInput();
    }

    public function destroy($id)
    {
        $data = $this->model->find($id);
        if($data){
            $data->delete();
        }
        return redirect()->route($this->table . '.index');
    }
}
