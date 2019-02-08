<?php
if(!_ALLOW_ACCESS){
    die("Not Allowed");
}

if(isset($_POST["submit"])){
    if(isset($_POST["first_name"]) && empty($_POST["first_name"])){
        $errors[] = "First Name Required";
    }
    if(isset($_POST["last_name"]) && empty($_POST["last_name"])){
        $errors[] = "Last Name Required";
    }
    if (isset($_POST["email"]) && empty($_POST["email"])){
        $errors[] = "E-mail Required";
    }
    if (!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
        $errors[] = "E-mail Not Valid";
    }
    if(isset($_POST["password"]) && empty($_POST["password"])){
        $errors[] = "Name Required";
    }
    if(strlen($_POST["password"]) < __PASSWORD_LEN__){
        $errors[] = "Password should be more than 8 char";
    }
    if(isset($_POST["job"]) && empty($_POST["job"])){
        $errors[] = "Job Required";
    }
//is_uploaded_file()
var_dump($_FILES);
    $check_cv = true;
    $check_img= true;
    $cv_size = $_FILES["file_cv"]["size"];
    $img_size = $_FILES["file_img"]["size"];
    $cv_type = pathinfo($_FILES["file_cv"]["name"], PATHINFO_EXTENSION)             ;
    $img_type= pathinfo($_FILES["file_img"]["name"], PATHINFO_EXTENSION);
    $cv = __DIR__ . basename($_FILES["file_cv"]["name"]);
    $img= __DIR__ . basename($_FILES["file_img"]["name"]);
    //$img = basename(__DIR__ , $_FILES["file_img"]["name"]);
    $dir = './uploads/'.$_FILES["file_img"]["name"];
var_dump($dir);
die("the end");

    if(isset($_FILES["file_img"]) && empty($_FILES["file_img"])){
        $errors[] = "Your Image Required";
    }
    if($img_type != __IMG_FORMAT__){    //--------------- PNG FORMAT
        $errors[] = "Image should be JPG format";
        var_dump($img_type);
    }
    if($img_size > __UPLOAD_SIZE__){
        $errors[] = "Image size should be 1 MB or less";
    }
    if(isset($_FILES["file_cv"]) && empty($_FILES["file_cv"])){
        $errors[] = "Your Cv Required";
    }
    if($cv_type != __CV_FORMAT__){       //--------------- PDF FORMAT
        $errors[] = "CV should be PDF format";
    }
    if($cv_size > __UPLOAD_SIZE__){
        $errors[] = "CV size should be 1MB or less";
    }

    if (empty($errors)){
        if (move_uploaded_file($_FILES["file_img"]["tmp_name"], $img ))
            echo "image uploaded";
            var_dump($img);

        if (move_uploaded_file($_FILES["file_cv"]["tmp_name"], $cv ))
            echo "Cv uploaded";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">

    <!-- Title Page-->
    <title>Register Form</title>

    <!-- Icons font CSS-->
    <link href="Views/public/Register/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="Views/public/Register/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="Views/public/Register/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="Views/public/Register/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="Views/public/Register/css/main.css" rel="stylesheet" media="all">
</head>

<body>
<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <h2 class="title">Registration Form</h2>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="row row-space" style="color: #c80000">
                        <?php
                            if(!empty($errors))
                                foreach ($errors as $error)
                                    echo "* $error <br>";
                        ?>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">first name</label>
                                <input class="input--style-4" type="text" name="first_name" value="<?php if(isset($_POST['first_name'])){echo $_POST['first_name'];}?>">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">last name</label>
                                <input class="input--style-4" type="text" name="last_name" value="<?php if(isset($_POST['last_name'])){echo $_POST['last_name'];}?>">
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Email</label>
                                <input class="input--style-4" type="email" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Password</label>
                                <input class="input--style-4" type="password" name="password">
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Job</label>
                                <input class="input--style-4" type="text" name="job" value="<?php if(isset($_POST['job'])){echo $_POST['job'];}?>">
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="input-group">
                            <div class="label">Upload Image</div>
                            <div class="input-group js-input-file">
                                <input type="file" name="file_img" value="<?php if(isset($_FILES['file_img'])){echo $_FILES['file_img']["name"];}?>">
<!--                                <label class="label--file" for="file">Choose Img</label>-->
<!--                                <span class="input-file__info">No Image chosen</span>-->
                            </div>
                            <div class="label--desc">Upload your IMG. Max file size 1 MB</div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="input-group">
                            <div class="label">Upload CV</div>
                            <div class="input-group js-input-file">
                                <input class="button" type="file" name="file_cv" id="file" value="<?php if(isset($_FILES['file_cv'])){echo $_FILES['file_cv']["name"];}?>">
<!--           class="input-file"   <label class="label--file" for="file">Choose file</label>-->
<!--                                <span class="input-file__info">No file chosen</span>-->
                            </div>
                            <div class="label--desc">Upload your CV. Max file size 1 MB</div>
                        </div>
                    </div>
                    <div class="p-t-15">
                        <button class="btn btn--radius-2 btn--blue" type="submit" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Jquery JS-->
<script src="Views/public/Register/vendor/jquery/jquery.min.js"></script>
<!-- Vendor JS-->
<script src="Views/public/Register/vendor/select2/select2.min.js"></script>
<script src="Views/public/Register/vendor/datepicker/moment.min.js"></script>
<script src="Views/public/Register/vendor/datepicker/daterangepicker.js"></script>

<!-- Main JS-->
<script src="Views/public/Register/js/global.js"></script>

</body>
</html>
<!-- end document-->