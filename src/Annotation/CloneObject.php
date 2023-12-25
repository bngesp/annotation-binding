<?php
namespace Bngesp\Lombok\Annotation;

use Bngesp\Lombok\Annotation\Base\AbstractAnnotation;

#[\Attribute(\Attribute::TARGET_CLASS|\Attribute::TARGET_PROPERTY)]
class CloneObject extends AbstractAnnotation{
    public function process(object $object){
        $properties = $this->getProperties();
        $method = '__clone';
        if(!method_exists($object, $method)){
            $object->$method = function() use ($properties){
                $clone = new $this;
                foreach($properties as $property){
                    $clone->$property = $this->$property;
                }
                return $clone;
            };
        }
    }
}