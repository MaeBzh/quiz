<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }


    /**
     * @Given the :arg1 field should contain :arg2
     */
    public function theFieldShouldContain($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @When I press :arg1
     */
    public function iPress($arg1)
    {
        $this->iPress("twoPlayers");
    }

    /**
     * @Then I should see text matching :arg1
     */
    public function iShouldSeeTextMatching($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given I am on :arg1
     */
    public function iAmOn($arg1)
    {
        $this->iAmOn("/quiz/public/");
    }

    /**
     * @When I should see :arg1
     */
    public function iShouldSee($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I go to :arg1
     */
    public function iGoTo($arg1)
    {
        $this->iGoTo("/quiz/public/games/create");
    }
}
