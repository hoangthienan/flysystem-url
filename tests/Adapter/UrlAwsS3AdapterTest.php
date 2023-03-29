<?php

namespace Go1\FlyUrl\Tests\Adapter;

use Aws\S3\S3Client;
use Go1\FlyUrl\Adapter\UrlAwsS3Adapter;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class UrlAwsS3AdapterTest extends TestCase
{
    use ProphecyTrait;
    private $clientMock;

    private $testSubject;

    protected function setUp(): void
    {
        $this->clientMock = $this->prophesize(S3Client::class);
        $this->testSubject = new UrlAwsS3Adapter(
            $this->clientMock->reveal(),
            'mybucket'
        );
    }

    public function testGetUrl()
    {
        $this->clientMock->getObjectUrl('mybucket', 'foo/bar')
            ->shouldBeCalled()
            ->willReturn('http://example.com/foo/bar');

        $this->assertEquals('http://example.com/foo/bar', $this->testSubject->getUrl('foo/bar'));
    }

    public function testGetUrlWithPrefix()
    {
        $this->clientMock->getObjectUrl('mybucket', 'a-prefix/foo/bar')
            ->shouldBeCalled()
            ->willReturn('http://example.com/a-prefix/foo/bar');

        $this->testSubject->setPathPrefix('a-prefix');
        $this->assertEquals('http://example.com/a-prefix/foo/bar', $this->testSubject->getUrl('foo/bar'));
    }
}
