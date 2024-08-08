<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class MakeEntityFields extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'make:entity-fields {name : Имя файла для создания}';

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
        $directory = 'app/Constants/EntityFields/';
        if (!File::isDirectory($directory)) {
            if (File::makeDirectory($directory, 0755, TRUE, TRUE) === FALSE) {
                $this->error('The directory could not be created.');
                return 1;
            }
        }
        $modelClass = '\App\Models\\'.ucfirst($fileName);
        $className = ucfirst($fileName) . 'Fields';
        $fileName = $fileName . 'Fields';
        $filePath = $directory . $fileName . '.php';
        if (File::exists($filePath)) {
            $this->error('Файл уже существует: ' . $fileName . '.php');

            return 1;
        }
        $constants = [];
        $isAuto = $this->ask('Сгенерировать автоматически из колонок таблицы (yes/no)?');
        if($isAuto === 'yes' || $isAuto === 'y'){

            if (class_exists($modelClass)){
                $model = new $modelClass;
                $tableName = $model->getTable();
                $columns = Schema::getColumnListing($tableName);
                foreach ($columns as $column){
                    $constants[$column] = $column;
                }
            }
            else{
                $this->error('Модель не найдена: ' . $modelClass);
                return 1;
            }
        }else{
            while (TRUE) {
                $constantName = $this->ask('Укажите константу (или нажмите Enter, чтобы закончить):');
                if (empty($constantName)) {
                    break;
                }
                $constants[$constantName] = $constantName;
            }
        }

        $content = "<?php\n\n";
        $content .= "namespace App\\Constants\\EntityFields;\n\n";
        $content .= 'class ' . $className . " {\n\n";
        foreach ($constants as $name => $value) {
            $content .= '    const ' . strtoupper($name) . " = '" . $value . "';\n";
        }
        $content .= "}\n";

        if (File::put($filePath, $content) !== FALSE) {
            $this->info("File created successfully: $fileName");
        }
        else {
            $this->error('The file could not be created.');
        }

        return 0;
    }
}
