<?php

namespace Avatar\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand as BaseCommand;

/**
 * Creates a model class for the avatar cms.
 * @author b3nl <code@b3nl.de>
 * @category Commands
 * @package Avatar
 * @subpackage Commands
 * @version $id$
 */
class ModelMakeCommand extends BaseCommand
{
    /**
     * Get the stub file for the generator.
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/model.stub';
    } // function
}
