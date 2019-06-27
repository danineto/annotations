# Annotations

This library gives the capacity to implement custom annotations for PHP classes.

It extends all functionality of [Doctrine/Annotations](https://github.com/doctrine/annotations).

## Requirements

This library uses PHP 7.2+.

## Installation

It is recommended that you install the library [throught composer](https://getcomposer.org).

To do so, run the Composer command to install the latest stable version:
```shell
composer require danineto/annotations
```

If not using composer you must also include this library: [Doctrine/Annotations](https://github.com/doctrine/annotations).

## Get Methods by Annotation

The get methods by annotation allow you to retrieve the class methods that implement a particular annotation and particular parameters.

### Example using the AsMethod annotation

```php
use Danineto\Annotations\AsMethod;
use Danineto\Annotations\Common\AnnotationReader;

$class = new class
{
    /**
     * @AsMethod(name="getExample")
     */
    function method()
    {
        return true;
    }
};

$reader = new AnnotationReader()
$methods = $reader->getMethodByAnnotation($class, AsMethod::class, [
    'name' => 'getExample'
]);

var_dump($methods);
```

### Parameters

Get Methods By Annotation parameters are:
* `class` the class object with the annotation
* `annotation` the annotation to search
* `parameters` the parameters values for the annotation


## License

Annotations library is open-source software licensed under the [MIT License](https://opensource.org/licenses/MIT).