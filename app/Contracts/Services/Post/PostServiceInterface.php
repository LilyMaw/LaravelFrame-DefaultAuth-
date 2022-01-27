<?php

namespace App\Contracts\Services\Post;

interface PostServiceInterface
{
    //get post list
    public function getPostList();

    /**
     * 
     * Store post data to table
     *
     * @return object
     */
    public function storePost($request);

    /**
     * 
     * Update post data to table
     *
     * @return object
     */
    public function updatePost($request, $post);


    /**
     * 
     * Delete post data from table
     *
     * @return object
     */
    public function deletePost($post);

    /**
     * 
     * Read uploaded file and store read data into DB
     *
     * @return array
     */
    public function importPost($request);

    /**
     * To download post csv file
     * @return File Download CSV file
     */
    public function downloadPost();

}