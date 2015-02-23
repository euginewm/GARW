<?php

interface IUser
{
    public function getFormLogin();

    public function getFormLogout();

    public function initFormLoginProcess();

    public function initFormLogoutProcess();
}