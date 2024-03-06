<?php 
 class VideoDetailsFormProvider {

    private $con;

    public function __construct($con) {
        
        $this->con = $con;

    }

    public function createUploadForm() {
        $fileInput = $this->createFileInput();
        $titleInput = $this->createTitleInput();
        $descriptionInput = $this->createDescriptionInput();
        $privacyInput = $this->createPrivacyInput();
        $categoriesInput = $this->createCategoiresInput();
        $uploadButton = $this->createUploadButton();

        return "<form action='processing.php' method='POST' enctype='multipart/form-data'>

                    $fileInput
                    $titleInput
                    $descriptionInput
                    $privacyInput
                    $categoriesInput
                    $uploadButton 
                    
                </form>";
    }

    private function createFileInput(){

        return "<div class='form-group'>
                    <input type='file' name='fileInput' class='form-control-file' id='exampleFormControlFile1' required>
                </div>";
    }

    private function createTitleInput() {

        return "<div class='form-group'>
                    <input class='form-control' type='text' name='titleInput' placeholder='Title'>
                </div>";
    }

    private function createDescriptionInput() {

        return "<div class='form-group'>
                    <textarea class='form-control' name='descriptionInput' rows='3' placeholder='Description'></textarea>
                </div>";
    }

    private function createPrivacyInput() {
        
        return "<div class='form-group'>
                    <select class='form-control' name='privacyInput'>
                        <option value='0'>Private</option>
                        <option value='1'>Public</option>
                    </select>
                </div>";
    }

    private function createCategoiresInput(){
        
        $query = $this->con->prepare("SELECT * FROM categories");
        $query->execute();

        $html = "<div class='form-group'>
                    <select class='form-control' name='categoryInput'>";
        $i = 0;

        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            // echo $row['name'] . "<br>";
            $id = $row['id'];
            $name = $row['name'];
            $html .= "<option value='$id'>$name</option>";
        }

        $html .= "</select>
                    </div>";

        return $html;
    }

    private function createUploadButton() {
        return "<button type='submit' name='uploadButton' class='btn btn-primary'>Upload</button>";
    }


 }


?>