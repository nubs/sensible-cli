<?php
namespace Nubs\Sensible\Command;

use Nubs\Sensible\CommandFactory\PagerFactory;
use Nubs\Which\LocatorFactory\PlatformLocatorFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\ProcessBuilder;

/**
 * A symfony console command to launch a pager.
 */
class Pager extends Command
{
    /**
     * Configures the command's options.
     *
     * @return void
     */
    protected function configure()
    {
        $this->setName('pager')
            ->setDescription('Launch a pager')
            ->addArgument('file', InputArgument::REQUIRED, 'The file to view');
    }

    /**
     * Launches the pager with the selected file.
     *
     * @param \Symfony\Component\Console\Input\InputInterface $input The command input.
     * @param \Symfony\Component\Console\Output\OutputInterface $output The command output.
     * @return int The return status
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $commandLocatorFactory = new PlatformLocatorFactory();
        $pagerFactory = new PagerFactory($commandLocatorFactory->create());
        $pager = $pagerFactory->create();
        $pager->viewFile(new ProcessBuilder(), $input->getArgument('file'));
    }
}
