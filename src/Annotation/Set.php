<?php
namespace Bngesp\Lombok\Annotation;

#[\Attribute(\Attribute::TARGET_CLASS|\Attribute::TARGET_PROPERTY)]
class Set extends AbstractAnnotation{
    public function process(object $object){
        $property = $this->getProperty();
        $method = 'set' . ucfirst($property);
        if(!method_exists($object, $method)){
            $object->$method = function($value) use ($property){
                $this->$property = $value;
            };
        }
    }
}