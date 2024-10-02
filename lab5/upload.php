<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Загрузка файла на сервер</title>
</head>
 <body>
  <div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_FILES['fupload']) && $_FILES['fupload']['error'] === UPLOAD_ERR_OK) {

            $fileName = $_FILES['fupload']['name'];
            $fileSize = $_FILES['fupload']['size'];
            $tmpName = $_FILES['fupload']['tmp_name'];
            $fileType = mime_content_type($tmpName);
            $errorCode = $_FILES['fupload']['error'];

            echo "<h3>Информация о загруженном файле:</h3>";
            echo "Имя файла: $fileName<br>";
            echo "Размер: $fileSize байт<br>";
            echo "Тип файла: $fileType<br>";

            if ($fileType === 'image/jpeg') {
                $newFileName = md5($fileName) . '.jpg';
                $uploadDir = 'upload/';

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                if (move_uploaded_file($tmpName, $uploadDir . $newFileName)) {
                    echo "Файл успешно загружен как: $newFileName";
                } else {
                    echo "Ошибка при перемещении файла.";
                }
            } else {
                echo "Допустимый тип файла: image/jpeg. Загруженный файл не подходит.";
            }
        } else {
            echo "Ошибка при загрузке файла";
        }
    }
?>

  </div>
  <form enctype="multipart/form-data"
        action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <p>
      <input type="hidden" name="MAX_FILE_SIZE" value="1024000">
      <input type="file"   name="fupload"><br>
      <button type="submit">Загрузить</button>
    </p>
   </form>
 </body>
</html>