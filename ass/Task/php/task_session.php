<?php

    try {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $file_name = $_POST['hidden_field'];
            $_SESSION[$file_name] = $_POST[$file_name];
            
            switch($file_name){
                case 'task_name':
                    header("Location: ../task_value.php"); 
                    break;
                case 'task_value';
                    header("Location: ../Task_home.php"); 
                    break;
                case 'start_date';
                    header("Location: ../Task_home.php"); 
                    break;
                case 'finish_date';
                    header("Location: ../Task_home.php"); 
                    break;
                case 'Task_background';
                    header("Location: ../Task_home.php"); 
                    break;
            }
        }
    }catch(Exception $e){
        echo '登録中にエラーが発生しました。<br>エラー内容 '.$e;
    }


?>