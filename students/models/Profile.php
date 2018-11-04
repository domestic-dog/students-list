<?php
/**
 * Created by PhpStorm.
 * User: mur
 * Date: 28.10.18
 * Time: 13:47
 */


class Profile
{
    public static function GetInfoById($id)
    {
        $id = intval($id);
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM reg WHERE id=' . $id);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetch();
    }
    public static function CheckSalt($id) {
        if (isset($_COOKIE['key'])) {
            $id = intval($id);
            $db = Db::getConnection();
            $key = $_COOKIE['key'];
//        var_dump($_COOKIE['key']);
            $result = $db->query('SELECT id FROM reg WHERE salt=' . $key);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $ia = $result->fetch();
            if ($id == $ia['id']) {
                return true;
            }
        }
        return false;

    }
    public static function goEdit($id)
    {
        if(Profile::CheckSalt($id) == true) {
            return true;
        }
    }
}