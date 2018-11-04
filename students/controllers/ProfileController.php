<?php
/**
 * Created by PhpStorm.
 * User: mur
 * Date: 28.10.18
 * Time: 13:47
 */

class ProfileController
{
    public function actionView($id)
    {
        $list = Profile::GetInfoById($id);


        require_once (ROOT . '/views/profile/index.php');
        if (Profile::CheckSalt($id) == true && isset($_POST['submit'])) {
            header("Location: /edit/$id");

        }
        return true;
    }

    public function actionEdit($id)
    {
        if(Profile::CheckSalt($id) == true) {
            $list = Profile::GetInfoById($id);
            require_once (ROOT . '/views/profile/edit.php');
            if (isset($_POST['submit'])) {
                $firstname = $_POST['firstname'];
                $surname = $_POST['surname'];
                $gender = $_POST['gender'];
                $groups = $_POST['groups'];
                $points = $_POST['points'];

                $errors = false;

                if (!User::checkName($firstname)) {
                    $errors['firstname'] = 'Ваше имя не может быть числом';
                }
                if (!User::checkSurname($surname)) {
                    $errors['surname'] = 'Ваша фамилия не может быть числом';
                }


                if (!User::checkPoints($points)) {
                    $errors['points'] = 'Вы не можете ввести больше 300 баллов';
                }


                if ($errors == false) {
                    $result = User::edit($id, $firstname, $surname, $gender, $groups, $points);
                    $message = true;

                }

            }

        } else {
            Router::gets();
        }

        return true;
    }
}