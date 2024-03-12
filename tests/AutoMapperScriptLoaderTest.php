<?php

namespace Skraeda\AutoMapper\Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skraeda\AutoMapper\AutoMapperScriptLoader;
use Skraeda\AutoMapper\Exceptions\AutoMapperException;

/**
 * Unit tests for script loader
 *
 * @author Gunnar Örn Baldursson <gunnar@sjukraskra.is>
 */
class AutoMapperScriptLoaderTest extends TestCase
{
    #[Test]
    public function itLoadsValidScript()
    {
        $mappings = (new AutoMapperScriptLoader)->require(implode(DIRECTORY_SEPARATOR, [__DIR__, 'cache', 'automapper.php']));

        $this->assertCount(1, $mappings);
    }

    #[Test]
    public function itThrowsExceptionForInvalidFiles()
    {
        $this->expectException(AutoMapperException::class);

        (new AutoMapperScriptLoader)->require('somethingthatdoesntexist.php');
    }
}
