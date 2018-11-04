<?php
/**
 * Created by PhpStorm.
 * User: mur
 * Date: 27.10.18
 * Time: 22:05
 */

class Site
{
    const SHOW_BY_DEFAULT = 50;

    public static function getList($count = self::SHOW_BY_DEFAULT, $page = 1) //$page = 1 вставить
    {
        $count = intval($count);
//        $page = intval($page);
//        $offset = $page * $count;

        $db = Db::getConnection();
        $List = array();

        $result = $db->query('SELECT  id, firstname, surname, gender, groups, points  FROM reg '
            . 'ORDER BY id DESC '
            . 'LIMIT ' . $count);
//            . ' OFFSET ' . $offset);

        $i = 0;
        while ($row = $result->fetch()) {
            $List[$i]['id'] = $row['id'];
            $List[$i]['firstname'] = $row['firstname'];
            $List[$i]['surname'] = $row['surname'];
            $List[$i]['gender'] = $row['gender'];
            $List[$i]['groups'] = $row['groups'];
            $List[$i]['points'] = $row['points'];
            $i++;
        }

        return $List;
    }


    public static function getMaxList($count = self::SHOW_BY_DEFAULT) //$page = 1 вставить
    {
        $count = intval($count);
//        $page = intval($page);
//        $offset = $page * $count;

        $db = Db::getConnection();
        $List = array();

        $result = $db->query('SELECT  id, firstname, surname, gender, groups, points  FROM reg '
            . 'ORDER BY points DESC '
            . 'LIMIT ' . $count);
//            . ' OFFSET ' . $offset);

        $i = 0;
        while ($row = $result->fetch()) {
            $List[$i]['id'] = $row['id'];
            $List[$i]['firstname'] = $row['firstname'];
            $List[$i]['surname'] = $row['surname'];
            $List[$i]['gender'] = $row['gender'];
            $List[$i]['groups'] = $row['groups'];
            $List[$i]['points'] = $row['points'];
            $i++;
        }

        return $List;
    }
    public  static  function Search($request)
    {

        $db = Db::getConnection();
        $srhresult = array();
        $sql = "Select id from `reg` where `firstname`  Like '%$request%' OR `surname` Like '%$request%' OR `gender` Like '%$request%'OR `groups` Like '%$request%'OR `points` Like '%$request%'";

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $srhresult[$i] = $row['id'];

            $i++;
        }
            $list = array();
            $s=0;
            $result = $db->prepare('SELECT   firstname, surname, gender, groups, points  FROM reg where id = ?');
            foreach($srhresult as $key => $id ) { // $srhresult -массив где хранятся мне нужные id


                $result->execute([$id]);
                $list[$s]= $result->fetch();



            $s++;
        }

            return $list;
    }




}