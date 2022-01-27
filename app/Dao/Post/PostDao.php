<?php

namespace App\Dao\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostDao implements PostDaoInterface
{
    /**
     * get post data from table
     * 
     * @return array
     */
    public function getPostList()
    {
        return Post::OrderBy('created_at')->where(function ($query) {

            if ($keyword =request('keyword')) {
                $query->where('title', 'like', '%'.$keyword.'%')
                ->orWhere('description', 'like', '%'.$keyword.'%');
            }
        })->paginate(5);

    }

    /**
     * store post data to table
     * 
     * @param request $request
     * @return object post
     */
    public function storePost($request)
    {  
        $post = new Post([
            'title' => $request->session()->get('title'),
            'description' => $request->session()->get('description'),
        ]);
        $post->created_user_id = $request->user()->id;;
        $post->updated_user_id = $request->user()->id;;
        $post->save();
        return $post;
    }

    /**
     * 
     * Update post data to table
     *
     * @param request $request
     * @param post $post
     * @return object post
     */
    public function updatePost($request, $post)
    {
        if ($request['status']) {
            $post->status = '1';
          } else {
            $post->status = '0';
          }
        $post->updated_user_id = $request->user()->id;
        $post->update($request->session()->all());
    }

    /**
     * 
     * Delete post data from table
     * @param post $post
     * @return object post
     */
    public function deletePost($post)
    {
        $post->delete();
    }

    /**
     * 
     * Read uploaded file and store read data into DB
     * @param request $request
     * @return object post
     */
    public function importPost($request)
    {
        if($request->hasFile('import_file')){  
            $path = $request->file('import_file')->getRealPath();  
            $data = array_map('str_getcsv', file($path)); 
            foreach ($data as $key => $value) {   
                $post = new Post([
                    'title' => $value[0],
                    'description' => $value[1],
                ]);
                $post->created_user_id = $request->user()->id;;
                $post->updated_user_id = $request->user()->id;;
                $post->save();
            }  
            if(!empty($insert)){  
                DB::table('posts')->insert($insert);  
            }  
        }  
    }

}