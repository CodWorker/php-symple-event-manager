<?php

namespace Coder\TestWork1;

class EventManager implements IEventManager 
{
    public function addEventListener($type, callable $callback){

    }

    public function fireEvent($type){

    }
    
    public function go(){
        echo "print";
    }
}