<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
            return $this->dataResponse('200',  config('statusCode.SUCCESS_VI') ,  $data);
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:10',
            'content' => 'required|min:20',
            'feature_image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'id_title_type' => 'required|numeric|exists:title_types,id',
            'id_user' => 'required|numeric|exists:users,id',
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors() , []);
        }

        $data = $request->all();
        $data['feature_image'] = uploadImage($request, 'feature_image', 'Post');
        $data = $this->table->createPost($data);
        return  $this->dataResponse('200',  $data ? config('statusCode.SUCCESS_VI') :config('statusCode.FAIL') , []);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if ($request->expectsJson()) {
            $data = $this->table->with("titleType")->with("user")->find($id);
            return $this->dataResponse($data ?'200' :'404', $data ? config('statusCode.SUCCESS_VI') :config('statusCode.NOT_FOUND_VI'),  $data);
        }
        return view('pages.post.detail', ['typeSite' => $this->table->orderBy('id', 'desc')->get()]);
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:10',
            'content' => 'required|min:20',
            'id_title_type' => 'required|numeric|exists:title_types,id',
            'id_user' => 'required|numeric|exists:users,id',
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors() , []);
        }
        $data=  $request->all();
        if(isset($data['_method'])){
            unset($data['_method']);
        }

        if($request->hasFile('feature_image')) {
            $data['feature_image'] = uploadImage($request, 'feature_image', 'Post');
        }

        $data = $this->table->updatePost($data, $id);
        return  $this->dataResponse($data ?'200' :'404',  $data ? config('statusCode.SUCCESS_VI') :config('statusCode.NOT_FOUND_VI') , []);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        if ($request->expectsJson()) {
            $data = $this->table->where('id', $id)->delete();
            return $this->dataResponse($data ?'200' :'404', $data ? config('statusCode.SUCCESS_VI') :config('statusCode.NOT_FOUND_VI'),  $data);
        }
        return view('pages.post.detail', ['typeSite' => $this->table->orderBy('id', 'desc')->get()]);
    }

    // phân trang bài viết
    public function getPostCustom(Request $request){
        $validator = Validator::make($request->all(), [
            'posts_on_page' => 'required|integer|min:0',
            'page' => 'required|integer|min:0'
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors() , []);
        }
        if ($request->expectsJson()) {
            $data = $this->table
                        ->with("titleType")->with("user")
                        ->paginate($request->posts_on_page);
            return $this->dataResponse('200',  config('statusCode.SUCCESS_VI') ,  $data);
        }
        return view('pages.post.list', ['typeSite' => $this->table->orderBy('id', 'desc')->get()]);
    }

    // Lấy bài viết mới nhất, cũ nhất
    public function getPostCustomNew(Request $request){
        $validator = Validator::make($request->all(), [
            'posts_on_page' => 'required|integer|min:0',
            'sort' => ['required', Rule::in(['DESC', 'ASC'])] ,
            'page' => 'required|integer|min:0'
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors() , []);
        }
        if ($request->expectsJson()) {
            $data = $this->table
                        ->with("titleType")->with("user")
                        ->orderBy('created_at', $request->sort)
                        ->paginate($request->posts_on_page);
            return $this->dataResponse('200',  config('statusCode.SUCCESS_VI') ,  $data);
        }
        return view('pages.post.list', ['typeSite' => $this->table->orderBy('id', 'desc')->get()]);
    }
    public function getPostWithUser(Request $request){
        $validator = Validator::make($request->all(), [
            'sort' => ['required', Rule::in(['DESC', 'ASC'])],
            'id_user' =>'required|exists:users,id',
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors() , []);
        }
        if ($request->expectsJson()) {
            $data = $this->table
                        ->with("titleType")->with("user")
                        ->orderBy('created_at', $request->sort)
                        ->where('id_user', $request->id_user)
                        ->get();
            return $this->dataResponse('200',  config('statusCode.SUCCESS_VI') ,  $data);
        }
        return view('pages.post.list', ['typeSite' => $this->table->orderBy('id', 'desc')->get()]);
    }
    public function getPostWithTitle(Request $request){
        $validator = Validator::make($request->all(), [
            'sort' => ['required', Rule::in(['DESC', 'ASC'])],
            'id_title_type' =>'required|exists:title_types,id',
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors() , []);
        }
        if ($request->expectsJson()) {
            $data = $this->table
                        ->with("titleType")->with("user")
                        ->orderBy('created_at', $request->sort)
                        ->where('id_title_type', $request->id_title_type)
                        ->get();
            return $this->dataResponse('200',  config('statusCode.SUCCESS_VI') ,  $data);
        }
        return view('pages.post.list', ['typeSite' => $this->table->orderBy('id', 'desc')->get()]);
    }
    public function searchLikeAll(Request $request){
        $validator = Validator::make($request->all(), [
            'key' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors() , []);
        }
        if ($request->expectsJson()) {
            $data = $this->table->searchLikeAll($request->key);
            return $this->dataResponse('200',  config('statusCode.SUCCESS_VI') ,  $data);
        }
        return view('pages.post.list', ['typeSite' => $this->table->orderBy('id', 'desc')->get()]);
    }
    public function searchUserPostTitletype(Request $request){
        $validator = Validator::make($request->all(), [
            'key' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors() , []);
        }
        if ($request->expectsJson()) {
            $data = $this->table->searchUserPostTitletype($request->key);
            return $this->dataResponse('200',  config('statusCode.SUCCESS_VI') ,  $data);
        }
        return view('pages.post.list', ['typeSite' => $this->table->orderBy('id', 'desc')->get()]);
    }
    public function reportPost(Request $request){
        $validator = Validator::make($request->all(), [
            'id_post' => 'required|exists:posts,id'
        ]);
        if ($validator->fails()) {
            return $this->dataResponse('401', $validator->errors() , []);
        }
        $post = $this->table->getPostById($request->id_post);
        $numberBadReports = $post->number_bad_reports ??'';
        $data = $this->table->updatePost(['number_bad_reports' =>($numberBadReports +1)] , $request->id_post);
        return  $this->dataResponse($data ?'200' :'404',  $data ? config('statusCode.SUCCESS_VI') :config('statusCode.NOT_FOUND_VI') , []);
    }



}
