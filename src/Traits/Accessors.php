<?php
namespace Bngesp\Lombok\Traits;


trait Accessors
{
    public function __contruct(array $data){
        $this->initialize($data);
    }

    public function initialize(array $data){
        foreach($data as $property  => $value){
            if(property_exists($this, $property)){
                $this->$property = $value;
            }
        }
    }

    public function __call($name, $arguments){
        $property = lcfirst(substr($name, 3));
        if(str_starts_with($name, Constant::GET)){
            return $this->$property;
        }elseif(str_starts_with($name, Constant::SET)){
            $this->$property = $arguments[0];
        }
    }

    public function __get($name){
        return $this->$name;
    }

    public function __set($name, $value){
        $this->$name = $value;
    }
}