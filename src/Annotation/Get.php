<?php
namespace Bngesp\Lombok\Annotation;

#[\Attribute(\Attribute::TARGET_CLASS|\Attribute::TARGET_PROPERTY)]
class Get extends AbstractAnnotation{
    public function process(object $object){
        $property = $this->getProperty();
        $method = 'get' . ucfirst($property);
        if(!method_exists($object, $method)){
            $object->$method = function() use ($property){
                return $this->$property;
            };
        }
    }
}