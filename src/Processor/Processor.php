<?php
namespace Bngesp\Lombok\Processor;

trait Processor
{
    public static function process(object $object, array $annotations)
    {
        foreach($annotations as $annotation){
            $annotation->process($object);
        }
    }
}
