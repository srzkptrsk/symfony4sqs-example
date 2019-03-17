<?php
/**
 * @author Siaržuk Piatroŭski (siarzuk@piatrouski.com)
 */

namespace App\Piatrouski\ExampleSqs\Message;

/**
 * Class Example
 * @package App\Piatrouski\ExampleSqs\Message
 */
class Example
{
    /**
     * @var string
     */
    private $_foo;

    /**
     * @return string
     */
    public function getFoo()
    {
        return $this->_foo;
    }

    /**
     * @param string $foo
     * @return $this
     */
    public function setFoo(string $foo)
    {
        $this->_foo = $foo;

        return $this;
    }
}
