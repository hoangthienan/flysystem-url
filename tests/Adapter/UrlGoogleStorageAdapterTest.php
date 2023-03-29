<?php

namespace Go1\FlyUrl\Tests\Adapter;

use Google\Cloud\Storage\Bucket;
use Google\Cloud\Storage\StorageClient;
use Go1\FlyUrl\Adapter\UrlAdapterInterface;
use Go1\FlyUrl\Adapter\UrlGoogleStorageAdapter;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class UrlGoogleStorageAdapterTest extends TestCase
{
    use ProphecyTrait;
    public function testItIsInstantiable()
    {
        $storageClient = $this->prophesize(StorageClient::class);
        $bucket = $this->prophesize(Bucket::class);
        $instance = new UrlGoogleStorageAdapter($storageClient->reveal(), $bucket->reveal());
        $this->assertInstanceOf(UrlAdapterInterface::class, $instance);
    }
}
