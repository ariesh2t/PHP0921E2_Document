<?php

require_once 'controllers/Controller.php';
require_once 'models/Staff.php';

class StaffController extends Controller {
    public function create(){
//        echo "<pre>";
//        print_r($_POST);
//        echo "</pre>";

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $salary = $_POST['salary'];
            $birthday = $_POST['birthday'];

            if(empty($name)) {
                $this->error['name'] = "Name field cannot be left blank";
            }
            if (!is_numeric($salary)) {
                $this->error['salary'] = "Invalid salary field format!";
            }

            if(empty($this->error)) {
                $gender = 0;
                $gender_values = $_POST['gender'];
                echo $gender_values;
                switch ($gender_values) {
                    case 0: $gender = 0; break;
                    case 1: $gender = 1; break;
                }
                $staff_model = new Staff();
                $datas = [
                    'name' => $name,
                    'description' => $description,
                    'gender' => $gender,
                    'salary' => $salary,
                    'birthday' => $birthday
                ];
                $is_insert = $staff_model->insert($datas);
                if ($is_insert) {
                    $_SESSION['success'] = 'Add new successful employees!';
                } else {
                    $_SESSION['success'] = 'Add new failed employees!';
                }
                header('Location: index.php?controller=staff&action=index');
                exit();
            }
        }
        $this->page_title = "Create record";
        $this->content = $this->render('views/staffs/create.php');

        // - Gọi layout để hiển thị các thông tin trên
        require_once 'views/layouts/main.php';
    }
}