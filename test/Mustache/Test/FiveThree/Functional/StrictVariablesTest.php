<?php

/*
 * This file is part of Mustache.php.
 *
 * (c) 2017 Enalean
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * @group lambdas
 * @group functional
 */
class Mustache_Test_FiveThree_Functional_StrictVariablesTest extends PHPUnit_Framework_TestCase
{
    private $mustache;

    public function setUp()
    {
        $this->mustache = new Mustache_Engine(array('strict_variables' => true));
    }

    public function testStrictVariablesInSection()
    {
        $tpl = $this->mustache->loadTemplate('{{#wrapper}}{{name}}{{/wrapper}}{{foo}}');

        $this->assertEquals('bar', $tpl->render(array('foo' => 'bar')));
    }

    public function testStrictVariablesInInvertedSections()
    {
        $tpl = $this->mustache->loadTemplate('{{^wrapper}}{{foo}}{{/wrapper}}');

        $this->assertEquals('bar', $tpl->render(array('foo' => 'bar')));
    }
}
