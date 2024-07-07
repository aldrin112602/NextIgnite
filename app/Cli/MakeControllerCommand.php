<?php

namespace App\Cli;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

class MakeControllerCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('make:controller')
            ->setDescription('Creates a new controller file')
            ->addArgument('controllerName', InputArgument::REQUIRED, 'The name of the controller file to create');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $controllerName = str_replace('.', '/', $input->getArgument('controllerName'));

        $path = __DIR__ . "/../Controllers/{$controllerName}.php";
        $dir = dirname($path);

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        if (!file_exists($path)) {
            file_put_contents($path, $this->getTemplate($controllerName));
            $quote = Quotes::getRandomQuote();
            $output->writeln("<info>Controller created successfully at: {$path}</info>");

            $style = new OutputFormatterStyle('yellow');
            $output->getFormatter()->setStyle('quote', $style);
            $output->writeln("<quote>Quote: {$quote}</quote>");
        } else {
            $output->writeln("<error>Controller already exists: {$path}</error>");
        }

        return Command::SUCCESS;
    }


    protected function getTemplate($controllerName)
    {
        $quote = Quotes::getRandomQuote();
        $splitName = explode("/", $controllerName);
        $controllerName = ucfirst($splitName[count($splitName) - 1]);

        return "<?php

namespace App\Controllers;

use App\Core\Controller;

class $controllerName extends Controller
{
    public function index()
    {
        // \$this->view('home/index');
    }
        // Add methods here
        // Quotes: \"$quote\"

}
";
    }
}
