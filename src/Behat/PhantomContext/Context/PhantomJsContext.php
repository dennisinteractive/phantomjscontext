<?php
namespace Behat\PhantomContext\Context;

use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Behat\Hook\Scope\AfterScenarioScope;
use Behat\MinkExtension\Context\MinkAwareContext;
use Behat\Mink\Mink;

class PhantomJsContext implements MinkAwareContext {

  /**
   * @var Mink
   */
  private $mink;

  /**
   * @BeforeScenario @javascript
   *
   * @param BeforeScenarioScope $scope
   */
  public function startPhantom(BeforeScenarioScope $scope) {
    $this->mink->getSession()->getDriver('phantomjs')->stop();
    $this->mink->getSession()->getDriver('phantomjs')->start();
  }

  /**
   * @AfterScenario @javascript
   *
   * @param AfterScenarioScope $scope
   */
  public function stopPhantom(AfterScenarioScope $scope) {
    $this->mink->getSession()->getDriver('phantomjs')->stop();
  }

  /**
   * @inheritdoc
   */
  public function setMink(Mink $mink) {
    $this->mink = $mink;
  }

  /**
   * @inheritdoc
   */
  public function setMinkParameters(array $parameters) {
    // TODO: Implement setMinkParameters() method.
  }
}
