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
        $info = array();
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM reg WHERE id=' . $id);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetch();
    }
}