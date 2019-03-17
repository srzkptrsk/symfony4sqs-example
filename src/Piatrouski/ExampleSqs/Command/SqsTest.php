<?php
/**
 * @author Siaržuk Piatroŭski (siarzuk@piatrouski.com)
 */

namespace App\Piatrouski\ExampleSqs\Command;

use App\Piatrouski\ExampleSqs\Message\Example;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Class SqsTest
 * @package App\Piatrouski\ExampleSqs\Command
 */
class SqsTest
    extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'example-sqs:test';

    /**
     * @var LoggerInterface
     */
    private $_logger;

    /**
     * @var MessageBusInterface
     */
    private $_messageBus;

    /**
     * SqsTest constructor.
     * @param LoggerInterface $logger
     * @param MessageBusInterface $messageBus
     * @param null $name
     */
    public function __construct(
        LoggerInterface $logger,
        MessageBusInterface $messageBus,
        $name = null
    ) {
        $this->_logger = $logger;
        $this->_messageBus = $messageBus;

        parent::__construct($name);
    }

    /**
     * @inheritdoc
     */
    protected function configure()
    {
        $options = [];
        $this->setDefinition($options);
        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void|null
     */
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {
        try {
            $this->sendMessage($this->_messageBus, 'bar');
        } catch (\Exception $e) {
            $output->writeln($e->getMessage());
            exit(1);
        }
    }

    /**
     * @param MessageBusInterface $bus
     * @param string $message
     * @throws \Exception
     */
    public function sendMessage(MessageBusInterface $bus, string $message)
    {
        try {
            $msg = new Example();
            $msg->setFoo($message);
            $bus->dispatch($msg);

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
