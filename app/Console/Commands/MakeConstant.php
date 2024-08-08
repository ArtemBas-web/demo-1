<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeConstant extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'make:constant {name : Имя файла для создания}';

    /**
     * The console command description.
     * @var string
     */
    protected $description = 'Создает файл констант с указанным именем и содержанием';

    /**
     * Execute the console command.
     * @return int
     */
    public function handle() {

        $fileName = $this->argument('name');
        $filePath = app_path('Constants/' . $fileName . '.php');
        if (file_exists($filePath)) {
            $this->error('Файл уже существует: ' . $fileName . '.php');

            return 1;
        }

        $constants = [];
        while (TRUE) {
            $constantName = $this->ask('Укажите константу (или нажмите Enter, чтобы закончить):');
            if (empty($constantName)) {
                break;
            }
            $constants[$constantName] = $constantName;
        }

        $content = "<?php\n\n";
        $content .= "namespace App\\Constants;\n\n";
        $content .= 'class ' . ucfirst($fileName) . " {\n\n";
        foreach ($constants as $name => $value) {
            $content .= '    const ' . strtoupper($name) . " = '" . $value . "';\n";
        }
        $content .= "}\n";

        file_put_contents($filePath, $content);

        $this->info('Файл констант успешно создан: ' . $fileName . '.php');

        return 0;
    }
}
