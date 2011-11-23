<?php

class Able_Auth_Adapter_Simple implements Zend_Auth_Adapter_Interface
{

    protected $identity;

    public function __construct($identity)
    {

        $this->identity = $identity;

    }

    public function authenticate()
    {

        if (!$this->identity) {

            return new Zend_Auth_Result(
                Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID,
                null,
                array('Supplied credential is invalid')
            );

        }

        return new Zend_Auth_Result(
            Zend_Auth_Result::SUCCESS,
            $this->identity,
            array('Authentication Successful')
        );

    }

}
