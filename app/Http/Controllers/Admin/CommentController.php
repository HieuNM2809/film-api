<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Comment();
        $this->table = "comment";
        $this->data = $this->model->withTrashed()->paginate($this->perPage);
        $this->controllerName = 'CommentController';
    }

    public function index()
    {
        // return $this->data;
        return view($this->view . $this->table . '.home')->with([
            'data' => $this->data,
            'table' => $this->table,
            'controllerName' => $this->controllerName
        ]);
    }

    public function create()
    {
        $data = new Post();
        $dataForeign["post"] = $data->all();
        $dataForeign["comment"] = $this->model->getListComment();
        return view($this->view . $this->table . '.add')->with([
            'table' => $this->table,
            'dataForeign' => $dataForeign,
            'controllerName' => $this->controllerName
        ]);
    }

    public function store(Request $request)
    {
        // dữ liệu
        $param = $request->all();
        $param = [
            "id_post" => $param["idPost"],
            "id_user" => $this->user,
            "parent" => $param["idComment"],
            "content" => $param["content"],
        ];
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
        $data = new Post();
        $dataForeign["post"] = $data->all();
        $dataForeign["comment"] = $this->model->withTrashed()->where('parent', null)->get();
        $data = $this->model->withTrashed()->find($id);
        return view($this->view . $this->table . '.edit')->with([
            'data' => $data,
            'id' => $id,
            'table' => $this->table,
            'dataForeign' => $dataForeign,
            'controllerName' => $this->controllerName
        ]);
    }

    public function update(Request $request, $id)
    {
        $param = $request->all();
        $param = [
            "id_post" => $param["idPost"],
            "id_user" => $this->user,
            "parent" => $param["idComment"],
            "content" => $param["content"],
        ];
        unset($param["_token"]);
        unset($param["_method"]);
        // upload avatar
        if ($request->image) {
            $name = uploadImage($request, 'image', $this->table);
            if (!$name) {
                return back()->withInput();
            }
        }
        $param['image'] = $name ?? "";
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
