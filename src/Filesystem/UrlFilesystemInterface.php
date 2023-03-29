<?php

namespace Go1\FlyUrl\Filesystem;

use League\Flysystem\FilesystemInterface;

interface UrlFilesystemInterface extends FilesystemInterface
{
    public function getUrl($path): string;
}
