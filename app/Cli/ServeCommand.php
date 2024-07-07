<?php

namespace App\Cli;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

class ServeCommand extends Command
{
    protected static $defaultName = 'serve';

    protected function configure()
    {
        $this
            ->setName('serve')
            ->setDescription('Starts the development server')
            ->setHelp('This command starts the PHP built-in server for development.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('<info>NextIgnite starting development server...</info>');

        $process = new Process(['php', '-S', 'localhost:8000', '-t', './public']);
        $process->setTimeout(null);
        $process->start();

        $output->writeln('Server running at <info>http://localhost:8000/</info>');
        $output->writeln('<comment>Press Ctrl+C to stop the server</comment>');

        while ($process->isRunning()) {
            // server running...
        }

        return Command::SUCCESS;
    }
}
