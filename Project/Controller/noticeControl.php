<?php 
	session_start();
	if (isset($_SESSION['username'])) {		

	} else {
		header("location: ../View/login.php");
	}

	$notice = $noticeErr = "";
	$isValid = true;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		#----- Current Password Varificaion -----#

		if (empty($_POST["notice"])) {
			$noticeErr = "*Input is required";
			$isValid = false;
		}
		else{
			$notice = $_POST["notice"];
		}

		if($isValid) {
			define("file", "../Model/notice.json");
		    $handle = fopen(file, "r");
		    $fr = fread($handle, filesize(file));
		    $json = NULL;

		    if(filesize(file) > 0) {
                $fr = fread($handle, filesize(file));
                $json = json_decode($fr);
                fclose($handle);
            }

		    $handle = fopen(file, "w");
        	if($json == NULL){
                $no = 1;
                $data = array(array("sl" => $no,
                                    "name" => $_SESSION['name'],
                                    "notice" => $notice));
                $data = json_encode($data);
            }
            else {
                $no = $json[count($json)-1]->no;
                $json[] = array("sl" => $no + 1,
                                "name" => $_SESSION['name'],
                                "notice" => $notice);
                $data = json_encode($json);
            }
            fwrite($handle, $data);
            fclose($handle);
			header("location: /Project/View/notice.php");
		}
		else {
            if($noticeErr != NULL)
                setcookie('msg', '<b>' . $noticeErr . '</b>', time() + 1, '/');

            header("location: /Project/View/notice.php");
        }
	}
?>