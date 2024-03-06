<?php 
include("includes/header.php"); 
include("includes/classes/VideoDetailsFormProvider.php"); 
?>

<div class='column'>

    <?php 
        $formProvider = new VideoDetailsFormProvider($con);
        echo $formProvider->createUploadForm();

    ?>

</div>


 
<?php include("includes/footer.php"); ?>
