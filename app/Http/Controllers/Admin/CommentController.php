<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Comment();
        $this->table = "comment";
        $this->data = $this->model->withTrashed()->paginate($this->perPage);
    }

    public function index()
    {
        // return $this->data;
        return view($this->view . $this->table . '.home')->with([
            'data' => $this->data,
            'table' => $this->table
        ]);
    }

    public function create()
    {
        return view($this->view . $this->table . '.edit')->with([
            'table' => $this->table
        ]);
    }

    public function store(Request $request)
    {
        // dữ liệu
        $param = $request->all();
        $param['IsAdmin'] = $param['IsAdmin'] == "on" ? 1 : 0;
        unset($param["_token"]);
        // upload avatar
        if ($request->Avatar) {
            $name = uploadImage($request, 'Avatar');
            if (!$name) {
                return back()->withInput();
            }
        }
        $param['Avatar'] = $name ?? "";
        // create account
        $create = insertTable($this->table . 's', $param);
        if ($create) {
            return redirect()->route($this->table . '.index');
        }
        return back()->withInput();
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->model->find($id);
        return view($this->view . $this->table . '.edit')->with([
            'data' => $data,
            'id' => $id,
            'table' => $this->table
        ]);
    }

    public function update(Request $request, $id)
    {
        $param = $request->all();
        if (isset($param['IsAdmin'])) {
            $param['IsAdmin'] = $param['IsAdmin'] == "on" ? 1 : 0;
        }
        unset($param["_token"]);
        unset($param["_method"]);
        // upload avatar
        if ($request->Avatar) {
            $name = uploadImage($request, 'Avatar');
            if (!$name) {
                return back()->withInput();
            }
        }
        $param['Avatar'] = $name ?? "";
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
