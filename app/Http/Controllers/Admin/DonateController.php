<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Models\Donate;
use App\Models\User;

class DonateController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Donate();
        $this->table = "donate";
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
        $data = new User();
        $dataForeign["user"] = $data->withTrashed()->get();
        return view($this->view . $this->table . '.add')->with([
            'table' => $this->table,
            'dataForeign' => $dataForeign
        ]);
    }

    public function store(Request $request)
    {
        // dữ liệu
        $param = $request->all();
        $param = [
            "link" => $param["link"],
            "id_user" => $param["idUser"]
        ];
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
        $data = new User();
        $dataForeign["user"] = $data->withTrashed()->get();
        $data = $this->model->withTrashed()->find($id);
        return view($this->view . $this->table . '.edit')->with([
            'data' => $data,
            'id' => $id,
            'table' => $this->table,
            'dataForeign' => $dataForeign
        ]);
    }

    public function update(Request $request, $id)
    {
        $param = $request->all();
        $param = [
            "link" => $param["link"],
            "id_user" => $param["idUser"]
        ];
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
