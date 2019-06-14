<?php namespace frontend\tests;

use common\models\LoginForm;
use frontend\models\ContactForm;

class FirstTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testEmptyLogin()
    {
       $login = new LoginForm();
        expect_not($login->login());
    }

    public function testLogin()
    {
        $login = new LoginForm();
        $login->username = 'some_user';
        $login->password = 'some_password';
        $login->rememberMe = true;
        expect($login->rememberMe)->equals($login->rememberMe);
        expect($login->username)->notEmpty();
        expect($login->password)->notEmpty();
        expect_that($login->validate($login->attributes));
    }

    public function testContact()
    {
        $contact = new ContactForm();

        $contact->attributes = [
            'name' => 'Tester',
            'email' => 'tester@example.com',
            'subject' => 'very important letter subject',
            'body' => 'body of current message',
        ];
        $this->assertArrayHasKey('name', $contact->attributes);
        $this->assertArrayHasKey('email', $contact->attributes);
        $this->assertArrayHasKey('subject', $contact->attributes);
        $this->assertArrayHasKey('body', $contact->attributes);
    }
}