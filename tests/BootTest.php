<?php
namespace Ray\Adr;

use Radar\Adr\Adr;


class BootTest extends \PHPUnit_Framework_TestCase
{
    protected $unlink;
    protected $tmpDir;

    protected function setUp()
    {
        $this->tmpDir = __DIR__ . '/tmp';
        deleteFiles($this->tmpDir);
    }

    protected function tearDown()
    {
        deleteFiles($this->tmpDir);
    }

    public function testAdr()
    {
        $boot = new Boot($this->tmpDir);
        $adr = $boot->adr();
        $this->assertInstanceOf(Adr::class, $adr);
    }

    public function testCached()
    {
        $instanceScript = $this->tmpDir . '/__Radar_Adr_Adr-.php';
        $this->assertFalse(file_exists($instanceScript));

        // boot 'im!
        $boot = new Boot($this->tmpDir);
        $adr = $boot->adr();
        $this->assertInstanceOf(Adr::class, $adr);
        $this->assertTrue(file_exists($instanceScript));
        // boot 'im agin, paw!
        $boot = new Boot($this->tmpDir);
        $adr = $boot->adr();
        $this->assertInstanceOf(Adr::class, $adr);
        $this->assertTrue(file_exists($instanceScript));
    }
}
