<?php

namespace Go1\FlyUrl\Tests\Filesystem;

use Go1\FlyUrl\Adapter\UrlAdapterInterface;
use Go1\FlyUrl\Filesystem\UrlFilesystem;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class UrlFilesystemTest extends TestCase
{
    use ProphecyTrait;
    public function testGetUrl()
    {
        $urlAdapterMock = $this->prophesize(UrlAdapterInterface::class);

        $urlAdapterMock->getUrl('moo')
            ->shouldBeCalled()
            ->willReturn('http://example.com');

        $testSubject = new UrlFilesystem($urlAdapterMock->reveal());
        $this->assertEquals('http://example.com', $testSubject->getUrl('moo'));
    }
}
