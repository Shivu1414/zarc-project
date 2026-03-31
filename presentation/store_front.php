<?php

class StoreFront
{
    public $loggedIn = 1;
    public $contentFile = 'admin_login.tpl';

    public function __construct()
    {
        if (login::isLoggedIn()) {
            if (isset($_SESSION['login_type'])) {
                $loginType = $_SESSION['login_type'];
            } elseif (isset($_COOKIE['login_type'])) {
                $loginType = $_COOKIE['login_type'];
            } else {
                $loginType = null;
            }

            if ($loginType === 'manager') {
                $this->handleManagerRequests();
            }
        } else {
            if (isset($_GET['register'])) {
                $this->contentFile = 'registration_form.tpl';
            } elseif (isset($_GET['home'])) {
                $this->contentFile = 'store_front.tpl';
            } else {
                $this->contentFile = 'admin_login.tpl';
            }
        }
    }

    private function handleManagerRequests()
    {
        if (isset($_GET['dashboard'])) {
            $this->contentFile = 'device_data.tpl';
        } else {
            $this->contentFile = 'device_data.tpl';
        }
    }
}

?>