<?php


class SiteController
{
    public function actionIndex()
    {
        Helper::checkAuth();
        $list = array();
        $list = Site::getList(20);
        require_once(ROOT . '/views/site/index.php');
        return true;
    }
    public static function actionNone()
    {
        require_once(ROOT . '/views/404/404.php');
        return true;
    }
}