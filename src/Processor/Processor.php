<?php
namespace Bngesp\Lombok\Processor;


use Bngesp\Lombok\Annotations\Method;

trait Processor
{
    public static function process(object $object, array $annotations)
    {
        foreach($annotations as $annotation){
            $annotation->process($object);
        }
    }

    public static function processMethod(object $object, string $property, string $method)
    {
        $methodName = $method . ucfirst($property);
        if(!method_exists($object, $methodName)){
            $object->$methodName = static::getMethod($object, $property, $method);
        }
    }

    public static function getMethod(object $object, string $property, string $method)
    {
        match($method)
        {
            Method::SET => function($value) use ($property){
                $this->$property = $value;
            },
            Method::TO_STRING => function() use ($object){
                return self::toString($object);
            },

            default => function() use ($property){
                return $this->$property;
            }
        };

    }

    public static function getProperties(object $object)
    {
        $properties = [];
        foreach(get_object_vars($object) as $property => $value){
            if(!in_array($property, ['name', 'value'])){
                $properties[] = $property;
            }
        }
        return $properties;
    }

    public static function getMethods(object $object)
    {
        $methods = [];
        foreach(get_class_methods($object) as $method){
            if(!in_array($method, ['__construct', '__call', '__get', '__set'])){
                $methods[] = $method;
            }
        }
        return $methods;
    }

    public static function getAnnotations(object $object)
    {
        $annotations = [];
        foreach(get_object_vars($object) as $property => $value){
            if(!in_array($property, ['name', 'value'])){
                $annotations[] = $value;
            }
        }
        return $annotations;
    }

    public static function getAnnotation(object $object, string $name)
    {
        $annotations = self::getAnnotations($object);
        foreach($annotations as $annotation){
            if($annotation->name === $name){
                return $annotation;
            }
        }
        return null;
    }

    public static function getAnnotationValue(object $object, string $name)
    {
        $annotation = self::getAnnotation($object, $name);
        if($annotation){
            return $annotation->value;
        }
        return null;
    }

    public static function getAnnotationProperties(object $object, string $name)
    {
        $annotation = self::getAnnotation($object, $name);
        if($annotation){
            return $annotation->getProperties();
        }
        return null;
    }

    public static function getAnnotationProperty(object $object, string $name, string $property)
    {
        $annotation = self::getAnnotation($object, $name);
        if($annotation){
            return $annotation->$property;
        }
        return null;
    }

    public static function getAnnotationMethods(object $object, string $name)
    {
        $annotation = self::getAnnotation($object, $name);
        if($annotation){
            return $annotation->getMethods();
        }
        return null;
    }

    public static function getAnnotationMethod(object $object, string $name, string $method)
    {
        $annotation = self::getAnnotation($object, $name);
        if($annotation){
            return $annotation->$method;
        }
        return null;
    }

    public static function toString(object $object)
    {
        $string = '';
        foreach(self::getProperties($object) as $property){
            $string .= $object->$property . ' ';
        }
        return $string;
    }
}
