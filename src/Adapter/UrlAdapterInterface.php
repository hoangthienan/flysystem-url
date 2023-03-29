<?php

namespace Go1\FlyUrl\Adapter;

use League\Flysystem\AdapterInterface;

interface UrlAdapterInterface extends AdapterInterface
{
    public function getUrl($path): string;
}
