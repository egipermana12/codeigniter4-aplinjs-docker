<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class GenerateFile extends BaseCommand
{
    /**
     * The Command's Group
     *
     * @var string
     */
    protected $group = 'Custom';

    /**
     * The Command's Name
     *
     * @var string
     */
    protected $name = 'generate:phpfile';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Generate a new PHP file';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'generate:phpfile [arguments] [options]';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [];

    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        $email = CLI::prompt('What is your email?', null, 'required|valid_email');
    }
}
