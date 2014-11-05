<?php

namespace Model;

use \Tool\SecurityTool;
use \Cocur\Slugify\Slugify;

class Post extends TextualContent {

    protected $title;
    protected $slug;

    public function getTitle(){
        return SecurityTool::safeOnGet( $this->title );
    }

    public function setTitle($title){
        $this->title = SecurityTool::safeOnSet( $title );
        return $this;
    }

    public function getSlug(){
        return $this->slug;
    }

    public function setSlug($slug){
        $this->slug = $slug;
        return $this;
    }

    public function setSlugFromTitle(){
    	$slugify = new Slugify();
    	$slug = $slugify->slugify( $this->getTitle() );
    	$this->setSlug($slug);
    }

}