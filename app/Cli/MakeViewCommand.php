<?php

namespace App\Cli;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

class MakeViewCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('make:view')
            ->setDescription('Creates a new view file')
            ->addArgument('viewName', InputArgument::REQUIRED, 'The name of the view file to create');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $viewName = str_replace('.', '/', $input->getArgument('viewName'));

        $path = __DIR__ . "/../Views/{$viewName}.nxt.php";
        $dir = dirname($path);

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        if (!file_exists($path)) {
            file_put_contents($path, $this->getTemplate());
            $quote = Quotes::getRandomQuote();
            $output->writeln("<info>View created successfully at: {$path}</info>");

            $style = new OutputFormatterStyle('yellow');
            $output->getFormatter()->setStyle('quote', $style);
            $output->writeln("<quote>Quote: {$quote}</quote>");
        } else {
            $output->writeln("<error>View already exists: {$path}</error>");
        }

        return Command::SUCCESS;
    }


    protected function getTemplate()
    {
        $quote = Quotes::getRandomQuote();
        return "<h1> View file created </h1>
<p>
    {$quote}
</p>

";
    }
}
