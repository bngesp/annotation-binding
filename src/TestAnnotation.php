<?php
namespace Bngesp\Lombok;

use Bngesp\Lombok\Annotation\CloneObject;
use Bngesp\Lombok\Annotation\Get;
use Bngesp\Lombok\Annotation\Method;
use Bngesp\Lombok\Annotation\Set;
use Bngesp\Lombok\Annotation\ToString;
use ReflectionClass;
use ReflectionProperty;

class TestAnnotation
{
    public function __construct(
        #[CloneObject]
        #[Get]
        #[Set]
        #[ToString]
        private string $name,
        private int $age
    ) {
    }
}

$reflectionClass = new ReflectionClass(TestAnnotation::class);
$properties = $reflectionClass->getProperties(ReflectionProperty::IS_PRIVATE);
foreach ($properties as $property) {
    $annotations = $property->getAttributes();
    foreach ($annotations as $annotation) {
        $annotation = $annotation->newInstance();
        $annotation->process($this);
    }
}

require_once __DIR__ . '../vendor/autoload.php';

$testAnnotation = new TestAnnotation('Bngesp', 18);
$testAnnotation->setName('Bngesp');
$testAnnotation->setAge(18);
echo $testAnnotation->getName() . PHP_EOL;
echo $testAnnotation->getAge() . PHP_EOL;
echo $testAnnotation . PHP_EOL;
$clone = clone $testAnnotation;
echo $clone . PHP_EOL;
$testAnnotation->setName('Bngesp2');
echo $testAnnotation . PHP_EOL;
