<?php


class SiteController
{
    public function actionIndex()
    {
        $list = array();
        $list = Site::getList(20);
        require_once (ROOT. '/views/site/index.php');
        return true;
    }
}