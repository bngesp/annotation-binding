<?php
namespace Bngesp\Lombok\Annotation\Base;

// Abstract function for annotation

#[\Attribute(\Attribute::TARGET_CLASS|\Attribute::TARGET_PROPERTY)]
class AbstractAnnotation 
{
    protected $name;
    protected $value;

    public function __construct(array $data)
    {
        $this->initialize($data);
    }

    public function initialize(array $data)
    {
        foreach($data as $property => $value){
            if(property_exists($this, $property)){
                $this->$property = $value;
            }
        }
    }

    public function __call($name, $arguments)
    {
        $property = lcfirst(substr($name, 3));
        if(substr($name, 0, 3) === 'get'){
            return $this->$property;
        }elseif(substr($name, 0, 3) === 'set'){
            $this->$property = $arguments[0];
        }
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value){
        $this->$name = $value;
    }

}