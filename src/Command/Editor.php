<?php
namespace Nubs\Sensible\Command;

use Nubs\Sensible\CommandFactory\EditorFactory;
use Nubs\Which\LocatorFactory\PlatformLocatorFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\ProcessBuilder;

/**
 * A symfony console command to launch an editor.
 */
class Editor extends Command
{
    /**
     * Configures the command's options.
     *
     * @return void
     */
    protected function configure()
    {
        $this->setName('editor')
            ->setDescription('Launch an editor')
            ->addArgument('file', InputArgument::REQUIRED, 'The file to edit');
    }

    /**
     * Launches the editor with the selected file.
     *
     * @param \Symfony\Component\Console\Input\InputInterface $input The command input.
     * @param \Symfony\Component\Console\Output\OutputInterface $output The command output.
     * @return int The return status
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $commandLocatorFactory = new PlatformLocatorFactory();
        $editorFactory = new EditorFactory($commandLocatorFactory->create());
        $editor = $editorFactory->create();
        $editor->editFile(new ProcessBuilder(), $input->getArgument('file'));
    }
}
