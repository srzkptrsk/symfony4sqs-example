<?php
/**
 * @author Siaržuk Piatroŭski (siarzuk@piatrouski.com)
 */

namespace App\Piatrouski\ExampleSqs\Handler;

use App\Piatrouski\ExampleSqs\Helper\Data;
use App\Piatrouski\ExampleSqs\Message\Example as ExampleMessage;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

/**
 * Class Example
 * @package App\Piatrouski\ExampleSqs\Handler
 */
class Example
    implements MessageHandlerInterface
{
    /**
     * @var LoggerInterface
     */
    private $_logger;

    /**
     * @var Data
     */
    private $_helper;

    /**
     * Example constructor.
     * @param $logger
     * @param Data $helper
     */
    public function __construct(
        LoggerInterface $logger,
        Data $helper
    ) {
        $this->_logger = $logger;
        $this->_helper = $helper;
    }

    public function __invoke(ExampleMessage $message)
    {
        $this->_logger->debug($message->getFoo());
        $this->_logger->debug($this->_helper->transformMessage($message->getFoo()));
    }
}
