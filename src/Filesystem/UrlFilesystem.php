<?php

namespace Go1\FlyUrl\Filesystem;

use League\Flysystem\Filesystem;
use Go1\FlyUrl\Adapter\UrlAdapterInterface;

class UrlFilesystem extends Filesystem implements UrlFilesystemInterface
{
    /**
     * @var UrlAdapterInterface
     */
    protected $adapter;

    public function __construct(UrlAdapterInterface $adapter, $config = null)
    {
        parent::__construct($adapter, $config);
    }

    public function getUrl($path): string
    {
        return $this->adapter->getUrl($path);
    }
}
