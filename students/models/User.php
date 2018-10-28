<?php

class User
{
    public static function register($firstname, $surname, $gender, $groups, $points, $email, $fromis)
    {


        $keyt = Helper::generateSalt();

        $db = Db::getConnection();
        setcookie('surname', $surname, time() + 60 * 60 * 24 * 30, '/');
        setcookie('key', $keyt, time() + 60 * 60 * 24 * 30, '/');
        $_COOKIE['surname'] = $surname;
        $_COOKIE['key'] = $keyt;


        $sql = 'INSERT INTO reg (firstname,	surname,	gender,	groups,	points, email, fromis, salt )'
            . 'VALUES (	:firstname,	:surname, :gender,	:groups,	:points, :email, :fromis, :salt )';
        $result = $db->prepare($sql);
//        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':gender', $gender, PDO::PARAM_STR);
        $result->bindParam(':groups', $groups, PDO::PARAM_STR);
        $result->bindParam(':points', $points, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':fromis', $fromis, PDO::PARAM_STR);
        $result->bindParam(':salt', $keyt, PDO::PARAM_STR);


        return $result->execute();

    }

    public static function checkName($firstname)
    {
        if (preg_match('/^([а-яА-ЯЁёa-zA-Z]+)$/u', $firstname)) {
            return true;

        }
        return false;


    }

    public static function checkSurname($surname)
    {
        if (preg_match('/^([а-яА-ЯЁёa-zA-Z]+)$/u', $surname)) {
            return true;

        }
        return false;


    }

    public static function checkEmailExists($email)
    {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM reg WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }


}

