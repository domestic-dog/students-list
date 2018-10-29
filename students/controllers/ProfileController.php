<?php
/**
 * Created by PhpStorm.
 * User: mur
 * Date: 28.10.18
 * Time: 13:47
 */

class ProfileController
{
    public function actionView($id)
    {
        $list = Profile::GetInfoById($id);


        require_once (ROOT . '/views/profile/index.php');
        return true;
    }

    public function actionEdit($id)
    {
        if(Profile::CheckSalt($id) == true) {
            $list = Profile::GetInfoById($id);
            require_once (ROOT . '/views/profile/edit.php');
    }   else {
//            require_once (ROOT . '/views/404/404.php');
        }

        return true;
    }
}