<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Models\TitleType;

class PostController extends BaseController
{
    private $table;
    function __construct()
    {
        $this->table = new Post();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->expectsJson()) {
            $data = $this->table->with("titleType")->with("user")->get();
            return $this->dataResponse('200','Thành công' ,  $data);
        }
        return view('pages.post.list', ['typeSite' => $this->table->orderBy('id', 'desc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.post.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'regions' => 'required'
        ], [
            'name.required' => 'vui lòng nhập tên',
            'regions.required' => 'vui lòng nhập vùng'
        ]);
        try {
            DB::beginTransaction();
            $responseData['data'] = $this->table->create([
                'name' => $request->name,
                'regions' => $request->regions
            ]);
            DB::commit();
            $responseData['result']  = 'Thành công';
        } catch (\PDOException $e) {
            DB::rollBack();
            $responseData['result'] = 'Thất bại';
        }

        // call api
        if ($request->expectsJson()) {
            return  response()->json($responseData);
        }
        return back()->with('thongbao', $responseData['result']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $responseData['result'] = 'Thành công';
            $responseData['data'] = $this->table->find($id);
        } catch (\PDOException $e) {
            $responseData['result'] = 'Thất bại';
        }
        return  $responseData;
        // return view('pages.post.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.post.edit', ['typeSites' => $this->table->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'regions' => 'required',
        ], [
            'name.required' => 'vui lòng nhập tên',
            'regions.required' => 'vui lòng nhập vùng'
        ]);
        try {
            DB::beginTransaction();
            $typeSites = $this->table->find($id);
            if (!empty($typeSites)) {
                $typeSites->name = $request->name;
                $typeSites->regions = $request->regions;
                $typeSites->save();
                DB::commit();
                $responseData['result']  = 'Thành công';
            } else {
                $responseData['result'] = 'Thất bại';
            }
        } catch (\PDOException $e) {
            DB::rollBack();
            $responseData['result'] = 'Thất bại';
        }
        if ($request->expectsJson()) {
            return  response()->json($responseData);
        }
        return back()->with('thongbao', $responseData['result']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $user = $this->table->find($id);
            if (!empty($user)) {
                $user->delete();
                DB::commit();
                $responseData['result']  = 'Thành công';
            } else {
                $responseData['result'] = 'Không tìm thấy user';
            }
        } catch (\PDOException $e) {
            DB::rollBack();
            $responseData['result'] = 'Thất bại';
        }

        // api call
        if ($request->expectsJson()) {
            return  $responseData;
        }

        //call web
        return back()->with('thongbao', $responseData['result']);
    }
}
