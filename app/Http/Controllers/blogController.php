<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Blog;
use App\User;
use DB;
class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function blog()
    {
        //dd(Auth::user());

        $blog = Blog::whereNull('blog.deleted_at')
                ->leftJoin('users','users.id','=','blog.user_id')
                ->select('users.first_name','users.last_name',
                    'blog.title','blog.description','blog.id')->get();

        $data['data'] = $blog;
        $data['auth'] = Auth::user();
        
        return view('blog',$data);
    }

    public function blogSubmit(Request $request)
    {
       // dd($request->all());

        $user = Auth::user();

        if(isset($user->id) && $user->id != null)
        {
            $input['user_id'] = $user->id;
            $input['title'] = $request->blog_heading;
            $input['description'] = $request->description;
            $input['slug'] = str_slug($request->blog_heading, "-");
            $input['status'] = 1;
            //dd($input);    
           // $result = blogModel::create($input);

            $result = DB::table('blog')->insert($input);

            if($result)
            {
                return view('blog');
            }

        }

        



    }


    public function editBlog(Request $request)
    {

        $editBlog = Blog::findOrFail($request->editID);

        $input['title'] = $request->title;
        $input['description'] = $request->description2;

        $res = $editBlog->fill($input)->save();


        return ['success'=>true];



    }

    public function deleteBlog(Request $request)
    {
        $Blog = Blog::findOrFail($request->editID);

        $Blog->delete();

        return ['success'=>true];
    }

}
