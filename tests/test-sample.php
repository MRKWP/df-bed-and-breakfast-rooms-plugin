<?php
/**
 * Class SampleTest
 *
 * @package 
 */

/**
 * Sample test case.
 */
class SampleTest extends WP_UnitTestCase
{

    public $container;
    public $factory;

    public function __construct()
    {
        parent::__construct();
        $this->container = \DF_BNB_ROOM\Container::getInstance();
        $this->factory = new WP_UnitTest_Factory();
    }
    /**
     * A single example test.
     */
    function test_sample()
    {
        // Replace this with some actual testing code.
        $this->assertTrue(true);
    }
}
