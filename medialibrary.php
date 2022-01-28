<?php


if (isset($_POST['folder'])) {
    $dir = "test" . DIRECTORY_SEPARATOR . $_POST['name'];
    mkdir($dir);
}
if (isset($_POST['file'])) {
    //  print_r($_POST);
    $file = "test" . DIRECTORY_SEPARATOR . $_POST['name'] . "." . $_POST['extension'];
    file_put_contents($file, $_POST['data']);
}

$data = scandir(__DIR__ . DIRECTORY_SEPARATOR . "test");
$files = [];
$folders = [];
foreach ($data as $index => $value) {
    if ($value !== '.' && $value !== '..') {
        $path = __DIR__ . DIRECTORY_SEPARATOR . "test" . DIRECTORY_SEPARATOR . $value;
        if (is_dir($path)) {
            array_push($folders, $value);
        } else {
            array_push($files, $value);
        }
    }
}




?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="contanier">
        <div class="row">
            <div class="col-12 text-center text-dark h1 mt-3">
                <h1>Library</h1>
                <div class="row">
                    <?php foreach ($folders as $key => $value) {
                    ?>
                        <div class="col-1">
                            <div class="card text-left">
                                <img class="card-img-top" src="images\folder.png" alt="">
                                <div class="card-body">
                                    <h4 class="card-title"><a href="test/<?= $value ?>"><?= $value ?></a></h4>
                                </div>
                            </div>
                        </div>
                    <?php  }
                    ?>


                    <?php foreach ($files as $key => $value) {
                        if (pathinfo($value)['extension'] == 'php') {
                            $image = "images/php.png";
                        } elseif (pathinfo($value)['extension'] == 'txt') {
                            $image = "images/text.png";
                        } else {
                            $image = "images/default.png";
                        }
                    ?>
                        <div class="col-1">
                            <div class="card text-left">
                                <img class="card-img-top" src="<?= $image; ?> " alt="">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $value ?></h4>
                                </div>
                            </div>
                        </div>
                    <?php  } ?>

                </div>
            </div>


            <div class="col-3 offset-3 mt-5">
                <form method="post">
                    <div class="form-group">
                        <label for="">Directory Name</label>
                        <input name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary rounded" name="folder">Creat Folder</button>
                    </div>
                </form>
            </div>

            <div class="col-3  mt-5">
                <form method="post">
                    <div class="form-group">
                        <label for="">File Name</label>
                        <input name="name" class="form-control">
                    </div>
                    <label for="">File Type</label>
                    <div class="form-group">
                        <select class="form-control" name="extension">
                            <option value="txt">Text</option>
                            <option value="php">php</option>
                            <option value="docx">word</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="">File Content</label>
                        <textarea class="form-control" name="data" rows="5" cols="30">
                        </textarea>
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-dark rounded" name="file">Creat File</button>
                    </div>
                </form>
            </div>

            <div class="col-3 offset-3 mt-5">
                <div class="form-group">
                    <form action="upload.php" method="post" enctype="multipart/form-data">

                        <input type="submit" value="Upload Image" name="submit">
                        <button class="btn btn-primary rounded" name="upload">Upload</button>
                </div>
                </form>
            </div>

        </div>
    </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>