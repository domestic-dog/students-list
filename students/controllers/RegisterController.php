<?php


class RegisterController
{
//    public function  actionIndex()
//    {
//
//        require_once (ROOT. '/views/register/index.php');
//        return true;
//    }

    public function actionIndex()
    {

        Helper::checkAuth();
        $firstname = '';
        $surname = '';
        $gender = '';
        $groups = '';
        $points = '';
        $email = '';
        $fromis = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $firstname = $_POST['firstname'];
            $surname = $_POST['surname'];
            $gender = $_POST['gender'];
            $groups = $_POST['groups'];
            $points = $_POST['points'];
            $email = $_POST['email'];
            $fromis = $_POST['fromis'];

            $errors = false;

            if (!User::checkName($firstname)) {
                $errors['firstname'] = 'Ваше имя не может быть числом';
            }
//
            if (!User::checkSurname($surname)) {
                $errors['surname'] = 'Ваша фамилия не может быть числом';
            }
//
//            if (!User::checkPassword($password)) {
//                $errors[] = 'Пароль не должен быть короче 6-ти символов';
//            }
//
//            if (User::checkEmailExists($email)) {
//                $errors[] = 'Такой email уже используется';
//            }


            if ($errors == false) {
                $result = User::register($firstname, $surname, $gender, $groups, $points,$email,$fromis);
                header("Location: / ");
            }

        }

        require_once(ROOT . '/views/register/index.php');

        return true;
    }
//    public  static  function setCokies {
//        $_SESSION['auth'] = true;
//        $key = Helper::generateSalt();
//
//    }
}