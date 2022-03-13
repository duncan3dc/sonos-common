<?php

namespace duncan3dc\Sonos\CommonTests\Utils;

use duncan3dc\Sonos\Common\Utils\Time;
use PHPUnit\Framework\TestCase;

class TimeTest extends TestCase
{
    /**
     * @return iterable<array<string|int>>
     */
    public function parseProvider(): iterable
    {
        yield [55, "00:00:55"];
        yield [":55", "00:00:55"];
        yield ["1:55", "00:01:55"];
        yield ["01:00", "00:01:00"];
        yield ["1:01:01", "01:01:01"];
        yield ["1:01:", "01:01:00"];
        yield ["1::", "01:00:00"];
        yield ["::", "00:00:00"];
    }
    /**
     * @dataProvider parseProvider
     * @param string $input
     */
    public function testParse($input, string $expected): void
    {
        $time = Time::parse($input);
        $this->assertSame($expected, $time->asString());
    }


    public function testFromFormat1(): void
    {
        $time = Time::fromFormat("%h:%m:%s", "05:04:03");
        $this->assertSame("05:04:03", $time->asString());
    }
    public function testFromFormat2(): void
    {
        $time = Time::fromFormat("%s:%m:%h", "59:44:14");
        $this->assertSame("14:44:59", $time->asString());
    }
    public function testFromFormat3(): void
    {
        $time = Time::fromFormat("%h:%m", "23:59");
        $this->assertSame("23:59:00", $time->asString());
    }
    public function testFromFormat4(): void
    {
        $time = Time::fromFormat("%m:%h", "30:22");
        $this->assertSame("22:30:00", $time->asString());
    }
    public function testFromFormat5(): void
    {
        $time = Time::fromFormat("%m:%s", "59:1");
        $this->assertSame("00:59:01", $time->asString());
    }
    public function testFromFormat6(): void
    {
        $time = Time::fromFormat("%s:%m", "30:22");
        $this->assertSame("00:22:30", $time->asString());
    }
    public function testFromFormat7(): void
    {
        $time = Time::fromFormat("%h:%s", "21:17");
        $this->assertSame("21:00:17", $time->asString());
    }


    public function testInSeconds1(): void
    {
        $time = Time::inSeconds(0);
        $this->assertSame(0, $time->asInt());
        $this->assertSame("00:00:00", $time->asString());
    }
    public function testInSeconds2(): void
    {
        $time = Time::inSeconds(60);
        $this->assertSame(60, $time->asInt());
        $this->assertSame("00:01:00", $time->asString());
    }
    public function testInSeconds3(): void
    {
        $time = Time::inSeconds(127);
        $this->assertSame(127, $time->asInt());
        $this->assertSame("00:02:07", $time->asString());
    }
    public function testInSeconds4(): void
    {
        $time = Time::inSeconds(3600);
        $this->assertSame(3600, $time->asInt());
        $this->assertSame("01:00:00", $time->asString());
    }
    public function testInSeconds5(): void
    {
        $time = Time::inSeconds(3725);
        $this->assertSame(3725, $time->asInt());
        $this->assertSame("01:02:05", $time->asString());
    }


    public function testStart(): void
    {
        $time = Time::start();
        $this->assertSame(0, $time->asInt());
        $this->assertSame("00:00:00", $time->asString());
    }


    public function testFormat1(): void
    {
        $time = Time::parse("1:9:4");
        $this->assertSame("01/09/04", $time->format("%H/%M/%S"));
    }
    public function testFormat2(): void
    {
        $time = Time::parse("01:05:02");
        $this->assertSame("1-5-2", $time->format("%h-%m-%s"));
    }
    public function testFormat3(): void
    {
        $time = Time::parse("99:59:59");
        $this->assertSame("99-59-59", $time->format("%h-%m-%s"));
    }
    public function testFormat4(): void
    {
        $time = Time::parse("00:00:00");
        $this->assertSame("0-0-0", $time->format("%h-%m-%s"));
    }


    public function testToString(): void
    {
        $time = Time::parse("01:02:03");
        $this->assertSame("01:02:03", (string) $time);
    }
}
