<?php

class User implements IUser
{

    /**
     * @var IRequest
     */
    private $Request;

    /**
     * @var ISession
     */
    private $Session;

    /**
     * @var IHeaders
     */
    private $Headers;

    private $FormIsSubmit = FALSE;

    public function __construct(IRequest $Request, ISession $Session, IHeaders $Headers)
    {
        $this->Request = $Request;
        $this->Session = $Session;
        $this->Headers = $Headers;
    }

    public function getFormLogin()
    {
        $FormRenderArray = array(
            '#action' => '/user/login',
        );

        $FormRenderArray[] = array(
            '#theme' => 'input',
            '#type' => 'text',
            '#name' => 'email',
            '#label' => 'Email',
        );

        $FormRenderArray[] = array(
            '#theme' => 'input',
            '#type' => 'password',
            '#name' => 'password',
            '#label' => 'Password',
        );

        $FormRenderArray[] = array(
            '#theme' => 'input',
            '#type' => 'submit',
            '#name' => 'login',
            '#value' => 'Login',
        );

        return $FormRenderArray;
    }

    public function FormLoginProcess()
    {
        if (!$this->Request->isEmptyPost()) {
            $this->FormIsSubmit = TRUE;
        }
    }

    public function FormLoginValidation()
    {
    }

    public function FormLoginSubmit()
    {
        if ($this->FormIsSubmit) {
            $this->Session->setVariable('user', TRUE);
            $this->Headers->gotoUrl('<front>');
        }
    }

    public function getFormLogout()
    {
        $FormRenderArray = array(
            '#action' => '/user/logout/process',
        );

        $FormRenderArray[] = array(
            '#theme' => 'input',
            '#type' => 'submit',
            '#name' => 'logout',
            '#value' => 'Logout',
        );

        return $FormRenderArray;
    }

    public function FormLogoutProcess()
    {
        if (!$this->Request->isEmptyPost()) {
            $this->FormIsSubmit = TRUE;
        }
    }

    public function FormLogoutValidation()
    {
    }

    public function FormLogoutSubmit()
    {
        if ($this->FormIsSubmit) {
            $this->Session->clearVariable('user');
            $this->Headers->gotoUrl('<front>');
        }
    }

    public function initFormLoginProcess()
    {
        $this->FormLoginProcess();
        $this->FormLoginValidation();
        $this->FormLoginSubmit();
    }

    public function initFormLogoutProcess()
    {
        $this->FormLogoutProcess();
        $this->FormLogoutValidation();
        $this->FormLogoutSubmit();
    }
}
