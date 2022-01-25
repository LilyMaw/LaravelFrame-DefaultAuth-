<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Contracts\Services\Post\PostServiceInterface;
class PostController extends Controller


{
    private $postInterface;

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostServiceInterface $postInterface)
    {
        $this->middleware('auth');
        $this->postInterface = $postInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {
        $data = $this->postInterface->getPostList();

        return view('post.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Display register confirmation page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirm_post(Request $request) 
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'description' => 'required',
        ], [
            'title.required' => 'Title can\'t be blank',
            'description.required' => 'Description can\'t be blank'
        ]);
        $title = $request->input('title');
        $description = $request->input('description');
        
        $request->session()->put('title',$title);
        $request->session()->put('description',$description);

        return view('post.confirm_post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->postInterface->storePost($request);  
        
        return redirect()->route('post.index')
                        ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.detail',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit',compact('post'));
    }

    /**
     * Display register confirmation page.
     *
     * @param  \App\Models\Post  $post
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit_confirm(Request $request,Post $post) 
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'description' => 'required',
        ], [
            'title.required' => 'Title can\'t be blank',
            'description.required' => 'Description can\'t be blank'
        ]);
        $title = $request->input('title');
        $description = $request->input('description');
        
        $request->session()->put('title',$title);
        $request->session()->put('description',$description);

        return view('post.edit_confirm',compact('post'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->postInterface->updatePost($request, $post);  

        return redirect()->route('post.index')
                        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->postInterface->deletePost($post);
    
        return redirect()->route('post.index')
                        ->with('success','Post deleted successfully');
    }

     /**
     * Show the form for file upload
     * 
     */
    public function fileImportExport()
    {
        return view('post.upload');
    }

    /**
     * Read uploaded file and store read data into DB
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)  
    {   
        $this->validate($request,[
            'import_file' => 'required|mimes:csv,txt',
        ], [
            'import_file.required' => 'Please choose a file',
        ]); 

        $this->postInterface->importPost($request);

        return redirect()->route('post.index')
            ->with('success', 'Post uploaded successfully.');
    }  


    /**
     * To download post csv file
     * @return File Download CSV file
     */
    public function export()
	{
		$postList = Post::get();
        $filename = "post.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, ['Title', 'Description', 'Posted User', 'Posted Date']);
    
        foreach ($postList as $row) {
            fputcsv($handle,  [
                
                $row->title, 
                $row->description, 
                $row->created_user,
                date('Y/m/d', strtotime($row->created_at))
            ]);
        }
        
        fclose($handle);
    
        $headers = array(
            'Content-Type' => 'text/csv',
        );
    
        return response()
          ->download($filename, $filename, $headers)
          ->deleteFileAfterSend(true);
	}
    
}