<?php

namespace App\Services\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Contracts\Services\Post\PostServiceInterface;
use App\Models\Post;
use App\Models\User;

class PostService implements PostServiceInterface
{
  private $postDao;

    /**
     * Class Constructor
     * 
     * @param PostDaoInterface $postDao
     * @return
     */
    public function __construct(PostDaoInterface $postDao)
    {
        $this->postDao = $postDao;
    }

    /**
     * 
     * Get product data from table
     *
     * @return array
     */
    public function getPostList()
    {   
        $posts = $this->postDao->getPostList();

        return $posts;
    }

    /**
     * 
     * Store post data to table
     *
     * @return object
     */
    public function storePost($request)
    {
        return $this->postDao->storePost($request);
    }

    /**
     * 
     * Update post data to table
     *
     * @return object
     */
    public function updatePost($request, $post)
    {
        return $this->postDao->updatePost($request , $post);
    }

    /**
     * 
     * Delete post data from table
     *
     * @return object
     */
    public function deletePost($post)
    {
        return $this->postDao->deletePost($post);
    }

    /**
     * 
     * Read uploaded file and store read data into DB
     *
     * @return array
     */
    public function importPost($request)
    {
        return $this->postDao->importPost($request);
    }

    /**
     * To download post csv file
     * @return File Download CSV file
     */
    public function downloadPost()
    {
        $postList = Post::get();
        $filename = "post.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, ['Title', 'Description', 'Posted User', 'Posted Date']);
    
        foreach ($postList as $row) {
            fputcsv($handle,  [
                
                $row->title, 
                $row->description, 
                User::find($row->created_user_id)->name,
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