<?php namespace frontend\tests\functional;
use Codeception\Example;
use frontend\tests\FunctionalTester;

class FirstCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests

    /**
     * @param FunctionalTester $I
     * @param Example $data
     * @dataProvider pageProvider
     */
    public function tryToTest(FunctionalTester $I, Example $data)
    {
        $I->amOnPage($data['url']);
        $I->see($data['h1']);
    }

    public function pageProvider()
    {
        return [
            ['url' => 'site/login', 'h1' => 'About'],
            ['url' => 'site/contact', 'h1' => 'Contact'],
            ['url' => 'site/signup', 'h1' => 'Signup'],
            ['url' => '/', 'h1' => 'Congratulationasdass'],
        ];
    }
}
