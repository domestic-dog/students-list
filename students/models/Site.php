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

    public static function getList($count = self::SHOW_BY_DEFAULT) //$page = 1 вставить
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
//    public static function PointsUp()
//    {
//        $db = Db::getConnection();
//        $result = $db->query('SELECT * FROM reg ORDER BY points DESC')
//        $result->setFetchMode(PDO::FETCH_ASSOC);
//        echo "$result";
//    }

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
        var_dump($List);

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
                 // в итоге оно выводит только первый айдишник, в чем может быть пробема?



            $s++;
        }

//        print_r($srhresult);
        var_dump($list);
            return $list;
    }


//        $result = $db->query('SELECT  id, firstname, surname, gender, groups, points  FROM reg ');
////            . ' OFFSET ' . $offset);
//
//        $i = 0;
//        while ($row = $result->fetch()) {
//            $List[$i]['id'] = $row['id'];
//            $List[$i]['firstname'] = $row['firstname'];
//            $List[$i]['surname'] = $row['surname'];
//            $List[$i]['gender'] = $row['gender'];
//            $List[$i]['groups'] = $row['groups'];
//            $List[$i]['points'] = $row['points'];
//            $i++;
//        }
//        $ise = $List;
//        $m3 = array();
//        $i=1;
//        $go= array();
//        foreach($ise  as $num) {
//            $m3[$i] = $num['firstname']. ' ' . $num['surname']. ' '. $num['gender']. ' '.$num['groups']. ' '. $num['points'];
//            $i++;
//        }
//        for ($s= 1; $s !=$i; $s++) {
//            $sd = $m3[$s];
//
//            $test = stripos($sd, $request);
//            if ($test !== false) {
//            array_push($go,$s);
//
//            }
//
//        }
//        print_r($go);
// $flipped = array_flip($go);
//  print_r($flipped);
//        $db = Db::getConnection();
//        $Listt = array();
//        $ss=0;
//        $result = $db->query('SELECT  id, firstname, surname, gender, groups, points  FROM reg '
//            . 'WHERE id='.$go[$ss]);
////            . ' OFFSET ' . $offset);
//
//        $i = 0;
//        while ($row = $result->fetch()) {
//            $List[$i]['id'] = $row['id'];
//            $List[$i]['firstname'] = $row['firstname'];
//            $List[$i]['surname'] = $row['surname'];
//            $List[$i]['gender'] = $row['gender'];
//            $List[$i]['groups'] = $row['groups'];
//            $List[$i]['points'] = $row['points'];
//            $i++;
//        }
//
//        return $List;


}