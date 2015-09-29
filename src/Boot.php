<?php
namespace Ray\Adr;

use Radar\Adr\Adr;
use Ray\Adr\Module\AdrModule;
use Ray\Compiler\DiCompiler;
use Ray\Compiler\Exception\NotCompiled;
use Ray\Compiler\ScriptInjector;
use Ray\Di\Injector;

class Boot
{
    protected $tmpDir;

    public function __construct($tmpDir = null, $userModule = null)
    {
        $this->tmpDir = $tmpDir ?: sys_get_temp_dir();
    }

    public function adr()
    {
        try {
            $injector = new ScriptInjector($this->tmpDir);
            $adr = $injector->getInstance(Adr::class);
        } catch (NotCompiled $e) {
            $compiler = new DiCompiler(new AdrModule, $this->tmpDir);
            $compiler->compile();
            $compiler->dumpGraph();
            $adr = $compiler->getInstance(Adr::class);
        }

        return $adr;
    }
}
