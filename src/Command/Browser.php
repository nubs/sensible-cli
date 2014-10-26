<?php
namespace Nubs\Sensible\Command;

use Nubs\Sensible\CommandFactory\BrowserFactory;
use Nubs\Which\LocatorFactory\PlatformLocatorFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\ProcessBuilder;

/**
 * A symfony console command to launch a browser.
 */
class Browser extends Command
{
    /**
     * Configures the command's options.
     *
     * @return void
     */
    protected function configure()
    {
        $this->setName('browser')
            ->setDescription('Launch a browser')
            ->addArgument('url', InputArgument::REQUIRED, 'The url to load');
    }

    /**
     * Launches the browser with the selected URL.
     *
     * @param \Symfony\Component\Console\Input\InputInterface $input The command input.
     * @param \Symfony\Component\Console\Output\OutputInterface $output The command output.
     * @return int The return status
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $commandLocatorFactory = new PlatformLocatorFactory();
        $browserFactory = new BrowserFactory($commandLocatorFactory->create());
        $browser = $browserFactory->create();
        $browser->viewURI(new ProcessBuilder(), $input->getArgument('url'));
    }
}
