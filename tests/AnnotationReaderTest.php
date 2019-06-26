<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Danineto\Annotations\Common\AnnotationReader;
use Danineto\Annotations\AsMethod;

class AnnotationReaderTest extends TestCase
{
    public function testGetMethodByAnnotation(): void
    {
        $class = new class
        {
            /**
             * @AsMethod(name="getExamples")
             */
            public function all()
            {
                return true;
            }
        };

        $reader = new AnnotationReader();
        $methods = $reader->getMethodByAnnotation($class, AsMethod::class, [
            'name' => 'getExamples'
        ]);

        $this->assertCount(1, $methods);
        $this->assertEquals('all', $methods[0]->name);
    }

    public function testGetMethodByAnnotationButNotFoundAnnotation(): void
    {
        $class = new class
        {
            public function all()
            {
                return true;
            }
        };

        $reader = new AnnotationReader();
        $methods = $reader->getMethodByAnnotation($class, AsMethod::class, [
            'name' => 'example'
        ]);

        $this->assertCount(0, $methods);
    }
}
