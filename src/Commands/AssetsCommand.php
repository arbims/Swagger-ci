<?php

namespace Swagger\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class AssetsCommand extends BaseCommand
{
    protected $group       = 'App';
    protected $name        = 'swagger:assets';
    protected $description = 'Copies JS files from the thirdparty folder to the public directory.';

    public function run(array $params)
    {
        $sourceDir = APPPATH . 'ThirdParty/Swagger/assets';
        $jsDest = FCPATH . 'js';
        $cssDest = FCPATH . 'css';

        // Ensure the source directory exists
        if (!is_dir($sourceDir)) {
            CLI::error("Source directory ($sourceDir) does not exist.");
            return;
        }

        // Ensure the destination directory exists, if not, create it
        if (!is_dir($jsDest)) {
            mkdir($jsDest, 0755, true);
            CLI::write("Created destination directory ($jsDest).");
        }
         // Copy all files from source to destination
         $this->copyFiles($sourceDir, $jsDest, 'js');

        if (!is_dir($cssDest)) {
            mkdir($cssDest, 0755, true);
            CLI::write("Created destination directory ($cssDest).");
        }

        // Copy all files from source to destination
        $this->copyFiles($sourceDir, $cssDest, 'css');

        CLI::write('files have been successfully copied!', 'green');
    }

    private function copyFiles($sourceDir, $destinationDir, $type)
    {
        // Get all JS files in the source directory
        $files = glob($sourceDir . '/*.'.$type);

        foreach ($files as $file) {
            $fileName = basename($file);
            $destination = $destinationDir . '/' . $fileName;

            if (copy($file, $destination)) {
                CLI::write("Copied: $fileName");
            } else {
                CLI::error("Failed to copy: $fileName");
            }
        }
    }
}
