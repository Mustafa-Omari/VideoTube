<?php 
class VideoProcessor { 
    
    private $con;
    // 5 handred milion bytes
    private $sizeLimit = 500000000;
    private $allowedTypes = array("mp4", "flv", "webm", "mkv", "vob", "ogv", "ogg", "avi", "wmv", "mov", "mpeg", "mpg");

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function upload($videoUploadData) {
         
        $targetDir = "uploads/videos/";
        $videoData = $videoUploadData->videoDataArray;

        // upload the video 
        $tempFilePath = $targetDir . uniqid() . basename($videoData["name"]);
        //"uploads/video/" . 61dc7473b9654 . Dog playing 
        //uploads/video/61dc7473b9654Dog_playing.flv

        $tempFilePath = str_replace(" ", "_", $tempFilePath);
    
        $isValidData = $this->processData($videoData, $tempFilePath);

        // echo $tempFilePath;

        if(!$isValidData) {
            return false;
        } 

        if(move_uploaded_file($videoData['tmp_name'], $tempFilePath)) {
            echo "File moved successfully";
        }

    }

    private function processData($videoData, $filePath) {
        $videoType = pathinfo($filePath, PATHINFO_EXTENSION);

        if(!$this->isValidSize($videoData)) {
            echo "File too large. Can't be more than " . $this->sizeLimit . " bytes ";
            return false;
        }
        else if(!$this->isValidType($videoType)) { 
            echo "Invalid file type ";
            return false;
        }
        else if($this->hasError($videoData)){
            echo "Error code: " . $videoData["error"] ; 
            return false;
        }

        return true;
    }

    private function isValidSize($data) {
        return $data['size'] <= $this->sizeLimit;
    }

    private function isValidType($type) {
        $lowercased = strtolower($type);
        return in_array($lowercased, $this->allowedTypes);
    }

    private function hasError($data) {
        return $data["error"] != 0;
    }

}
?>