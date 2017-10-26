<?php
namespace Behat\PhantomContext\Context;

use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Behat\Hook\Scope\AfterScenarioScope;
use Behat\MinkExtension\Context\MinkAwareContext;
use Behat\Mink\Mink;

class PantomJsContext implements MinkAwareContex {

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
    echo 'start';
    $this->Mink->getSession()->getDriver('phantomjs')->stop();
    $this->Mink->getSession()->getDriver('phantomjs')->start();
  }

  /**
   * @AfterScenario @javascript
   *
   * @param AfterScenarioScope $scope
   */
  public function stopPhantom(AfterScenarioScope $scope) {
    echo 'stop';
    $this->MinkContext->getSession()->getDriver('phantomjs')->stop();
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
