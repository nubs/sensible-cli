<?php
namespace Nubs\Sensible;

use Symfony\Component\Console\Application as SymfonyApplication;
use Nubs\Sensible\Command\Browser;
use Nubs\Sensible\Command\Editor;

/**
 * The symfony application wrapper for sensible.
 */
class Application extends SymfonyApplication
{
    /**
     * Initialize the sensible application with all of the different commands.
     */
    public function __construct()
    {
        parent::__construct('sensible', '0.1.0');

        $browserCommand = new Browser();
        $editorCommand = new Editor();
        $this->add($browserCommand);
        $this->add($editorCommand);
    }
}
