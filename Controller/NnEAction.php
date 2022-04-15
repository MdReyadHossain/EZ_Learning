<?php 
    session_start();
    require '../Model/AdminDB.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form submit</title>
    </head>
    <body>
        <?php 
            $news = $date = "";

            $isValid = true;
            $isChecked = $isEmpty = false;

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $isChecked = true;
                function test($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                $news = test($_POST["news"]);
                $date = test($_POST["date"]);

                if(empty($news)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                if($isValid and $isChecked){
                    // data insertion
                    news($news, $date);
                    header("location: /ProjectEZ/View/NnEdata.php");
                }

                else {
                    setcookie('msg', '<b>❗Required input missing</b><br>', time() + 1, '/');
                    header("location: /ProjectEZ/View/NnE.php");
                }
            }
        ?>
    </body>
</html>