<?php


class SiteController
{
    public function actionIndex($id)
    {
        Helper::checkAuth();
        $message = false;
        $list = array();
        $list = Site::getList(50);
        require_once(ROOT . '/views/site/index.php');

        return true;
    }

    public function actionNone()
    {
        require_once(ROOT . '/views/404/404.php');
        return true;
    }
    public function actionMaxpoints()
    {
        Helper::checkAuth();
        $list = array();
        $list = Site::getmaxList();
        require_once(ROOT . '/views/site/index.php');
        return true;
    }

    public function actionResult()
    {
        Helper::checkAuth();
        if (isset($_POST['submits'])) {
            $request = $_POST['req'];
            $list = array();
            $list = Site::Search($request);
            require_once(ROOT . '/views/site/index.php');

        }
        return true;
    }
}