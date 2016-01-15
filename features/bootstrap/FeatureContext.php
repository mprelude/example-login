<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext,
    Behat\Mink\Driver\GoutteDriver,
    Behat\Mink\Session;

use ExampleLogin\Auth;

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    private $authObject;
    private $output;
    private $driver;
    private $session;

    /**
     * Initializes context.
     * Every scenario gets its own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        $this->driver  = new GoutteDriver();
        $this->session = new Session($this->driver);
    }

    /**
     * @Given /^I have created an authentication object$/
     */
    public function iHaveCreatedAnAuthenticationObject()
    {
        $this->authObject = new \ExampleLogin\Auth;
    }

    /**
     * @When /^I set the username as "([^"]*)"$/
     */
    public function iSetTheUsernameAs($username)
    {
        $this->authObject->setUsername($username);
    }

    /**
     * @Given /^I set the password as "([^"]*)"$/
     */
    public function iSetThePasswordAs($password)
    {
        $this->authObject->setPassword($password);
    }

    /**
     * @Given /^I submit the login request$/
     */
    public function iSubmitTheLoginRequest()
    {
        $this->output = $this->authObject->submitLogin();
    }

    /**
     * @Then /^I should see "([^"]*)"$/
     */
    public function iShouldSee($expected)
    {
        if ($expected !== $this->output) {
            throw new Exception("Actual output is ".$this->output);
        }
    }

    /**
     * @Given /^I am on "([^"]*)"$/
     */
    public function iAmOn($url)
    {
        $this->session->restart();
        $this->session->visit($url);
    }

    /**
     * @When /^I fill in "([^"]*)" with "([^"]*)"$/
     */
    public function iFillInWith($field, $value)
    {
        $obj = $this->session->getPage()->find('named', array('field', $field));

        $obj->setValue($value);
    }

    /**
     * @Given /^I press "([^"]*)"$/
     */
    public function iPress($name)
    {
        $obj = $this->session->getPage()->find('named', array('button', $name));

        $obj->click();
    }

    /**
     * @Then /^the "([^"]*)" div should say "([^"]*)"$/
     */
    public function theDivShouldSay($div, $message)
    {
        $obj = $this->session->getPage()->find('named', array('id_or_name', $div));

        if ($obj->getHtml() !== $message) {
            throw new Exception("Actual output is ".$obj->getHtml());
        }
    }
}
