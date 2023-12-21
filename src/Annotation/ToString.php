<?php
namespace Bngesp\Lombok\Annotation;

#[\Attribute(\Attribute::TARGET_CLASS|\Attribute::TARGET_PROPERTY)]
class ToString extends AbstractAnnotation{
    public function process(object $object){
        $properties = $this->getProperties();
        $method = '__toString';
        if(!method_exists($object, $method)){
            $object->$method = function() use ($properties){
                $string = '';
                foreach($properties as $property){
                    $string .= $this->$property . ' ';
                }
                return $string;
            };
        }
    }
}