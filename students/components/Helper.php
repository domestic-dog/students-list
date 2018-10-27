<?php
/**
 * Created by PhpStorm.
 * User: mur
 * Date: 27.10.18
 * Time: 23:50
 */

class Helper
{
    public static function generateSalt()
    {
        $salt = '';
        $saltLength = 8; //длина соли
        for ($i = 0; $i < $saltLength; $i++) {
            $salt .= chr(mt_rand(33, 126)); //символ из ASCII-table
        }
        return $salt;
    }

    public static function checkCocie()
    {
        if (!empty($_COOKIE['surname']) and !empty($_COOKIE['key'])) {
            //Пишем логин и ключ из КУК в переменные (для удобства работы):
            $surname = $_COOKIE['surname'];
            $key = $_COOKIE['key']; //ключ из кук (аналог пароля, в базе поле cookie)

            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM reg WHERE surname="$surname"' .  'AND salt="$key"');
            $result->fetch(PDO::FETCH_ASSOC);

            if (!empty($result)) {
                //Стартуем сессию:
                session_start();

                //Пишем в сессию информацию о том, что мы авторизовались:
                $_SESSION['auth'] = true;


            }
        }

    }

    public static function checkAuth()
    {
        if ($_SESSION['auth'] == true) {
            header("Location: /  ");
        }
    }
}