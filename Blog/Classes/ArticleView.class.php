<?php

class ArticleView extends Article{

    //fields
    private $uid;

    //constructor
    public function __construct($uid){
        $this->uid = $uid;
    }

    public function getArticles(){
        //all Articles class function to get the articles
        $this->Retrieve($this->uid);
    }

}