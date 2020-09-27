<?php

namespace Larsklopstra\Nebula\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Container\BindingResolutionException;

trait LoadResources
{
    /**
     * Load resource classes from directory.
     *
     * @return array
     * @throws BindingResolutionException
     */
    public function LoadResources(): array
    {
        $files = File::allFiles(base_path(config('nebula.resources_path')));

        return array_map(function($file) {
            $class = 'App\Nebula\Resources\\' . $file->getFilenameWithoutExtension();
            return new $class;
        }, $files);
    }
}
