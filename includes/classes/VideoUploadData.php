<?php 
class VideoUploadData {

    public $videoDataArray, $title, $description, $privacy, $category, $uploadedBy;

    public function __construct($videoDataArray, $title, $description, $privacy, $category, $uploadedBy)
    {
        $this->videoDataArray = $videoDataArray;
        $this->title = $title;
        $this->description = $description;
        $this->privacy = $privacy;
        $this->category = $privacy;
        $this->uploadedBy = $uploadedBy;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

}


?>