<?php
    define("file", "../Model/tempStudent.json");
    if (isset($_GET['id'])) {		
        $id = $_GET['id'];

        $handle = fopen(file, "r");
        $fr = fread($handle, filesize(file));
        $arr1 = json_decode($fr);
        $fc = fclose($handle);

        for($i = 0; $i < count($arr1); $i++) {
            if(+$id === $arr1[$i]->id) {
                $fname = $arr1[$i]->fname;
                $lname = $arr1[$i]->lname;
                $gender = $arr1[$i]->gender;
                $religion = $arr1[$i]->religion;
                $dob = $arr1[$i]->dob;
                $phone = $arr1[$i]->phone;
                $email = $arr1[$i]->email;
                $preaddress = $arr1[$i]->preaddress;
                $paraddress = $arr1[$i]->paraddress;
                $username = $arr1[$i]->username;
                $password = $arr1[$i]->password;
            }
        }

        $handle = fopen(file, "w");
        $arr2 = array();
        for ($i = 0; $i < count($arr1); $i++) {
            if (+$id !== $arr1[$i]->id) {
                array_push($arr2, $arr1[$i]);
            }
        }

        $data = json_encode($arr2);
        $fw = fwrite($handle, $data);
        $fc = fclose($handle);

        header('location: /Project/View/studentreq.php');
    }
    else {
        die("Invalid Request");
    }
    echo "<h3>✅Teacher Approved</h3><br>";
?>