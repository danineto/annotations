<?php

namespace Danineto\Annotations;

/**
 * @Annotation
 * @Target("METHOD")
 */
final class AsMethod
{
    /**
     * @Required
     * @var string
     */
    public $name;

    /**
     * @var bool
     */
    public $unique;
}
