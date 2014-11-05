<?php

namespace Model;

use \Tool\SecurityTool;

class Post extends TextualContent {

    protected $title;

    public function getTitle(){
        return SecurityTool::safeOnGet( $this->title );
    }

    public function setTitle($title){
        $this->title = SecurityTool::safeOnSet( $title );
        return $this;
    }

}