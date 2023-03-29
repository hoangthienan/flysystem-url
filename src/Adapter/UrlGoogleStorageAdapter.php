<?php

namespace Go1\FlyUrl\Adapter;

use Superbalist\Flysystem\GoogleStorage\GoogleStorageAdapter;

class UrlGoogleStorageAdapter extends GoogleStorageAdapter implements UrlAdapterInterface
{
    public function getUrl($path): string
    {
        // TODO implement method
    }
}
