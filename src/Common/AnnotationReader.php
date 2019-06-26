<?php

namespace Danineto\Annotations\Common;

use Doctrine\Common\Annotations\AnnotationReader as Reader;

final class AnnotationReader extends Reader
{
    /**
     * Gets the methods with a particular annotation.
     * 
     * @param object $class
     * @param string $annotation
     * @param array $parameters
     * 
     * @return array
     */
    public function getMethodByAnnotation(object $class, string $annotation, array $parameters = []): array
    {
        $reflectionClass = new \ReflectionClass($class);
        $methods = $reflectionClass->getMethods();

        return array_filter($methods, function ($method) use ($parameters, $annotation) {
            $myAnnotation = $this->getMethodAnnotation($method, $annotation);

            if (is_null($myAnnotation)) {
                return false;
            }

            $myParameters = array_intersect_assoc($parameters, (array)$myAnnotation);

            return count($myParameters) > 0;
        }, ARRAY_FILTER_USE_BOTH);
    }
}
