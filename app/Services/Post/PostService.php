<?php

namespace App\Services\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Contracts\Services\Post\PostServiceInterface;

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

}