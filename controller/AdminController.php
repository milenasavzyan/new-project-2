<?php

class AdminController
{
    public function Login()
    {
        $adminModel = new AdminModel();
        $adminModel->AdminLogin();
    }
}