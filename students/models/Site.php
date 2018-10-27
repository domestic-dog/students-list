<?php
/**
 * Created by PhpStorm.
 * User: mur
 * Date: 27.10.18
 * Time: 22:05
 */

class Site
{
    const SHOW_BY_DEFAULT = 20;
    public static function getList($count = self::SHOW_BY_DEFAULT ) //$page = 1 вставить
    {
        $count = intval($count);
//        $page = intval($page);
//        $offset = $page * $count;

        $db = Db::getConnection();
        $List = array();

        $result = $db->query('SELECT  firstname, surname, gender, groups, points  FROM reg '
            . 'ORDER BY id DESC '
            . 'LIMIT ' . $count);
//            . ' OFFSET ' . $offset);

        $i = 0;
        while ($row = $result->fetch()) {
            $List[$i]['firstname'] = $row['firstname'];
            $List[$i]['surname'] = $row['surname'];
            $List[$i]['gender'] = $row['gender'];
            $List[$i]['groups'] = $row['groups'];
            $List[$i]['points'] = $row['points'];
            $i++;
        }

        return $List;
    }
}