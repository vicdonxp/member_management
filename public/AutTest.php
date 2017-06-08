<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/7/2017
 * Time: 10:52 PM
 */
namespace DetariAuth\Authentication;

class AutTest extends \PHPUnit_Framework_TestCase {

    public function testNachHasCheese()
    {
        $nacho = new Authentication;

        $this->assertTrue($nacho->hasCheese());
    }
}