<?php

namespace App\Cli;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

class MakeModelCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('make:model')
            ->setDescription('Creates a new model file')
            ->addArgument('modelName', InputArgument::REQUIRED, 'The name of the model file to create');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $modelName = str_replace('.', '/', $input->getArgument('modelName'));

        $path = __DIR__ . "/../Models/{$modelName}.php";
        $dir = dirname($path);

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        if (!file_exists($path)) {
            file_put_contents($path, $this->getTemplate($modelName));
            $quote = Quotes::getRandomQuote();
            $output->writeln("<info>Model created successfully at: {$path}</info>");

            $style = new OutputFormatterStyle('yellow');
            $output->getFormatter()->setStyle('quote', $style);
            $output->writeln("<quote>Quote: {$quote}</quote>");
        } else {
            $output->writeln("<error>Model already exists: {$path}</error>");
        }

        return Command::SUCCESS;
    }


    protected function getTemplate($modelName)
    {
        $quote = Quotes::getRandomQuote();
        $splitName = explode("/", $modelName);
        $modelName = ucfirst($splitName[count($splitName) - 1]);
        return "<?php

namespace App\Models;

class $modelName
{
    // Define your model properties and methods here
    // $quote
}
";
    }
}
