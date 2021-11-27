<?php

namespace Coder\TestWork1;

/**
 * Class EventManager
 * 
 * Basic usage:
 * 
 * $em = new EventManager();
 * $em->addEventListener("type_one", $firstFunc);
 * $em->addEventListener("type_two", $secondFunc);
 * $em->addEventListener("type_two", $thirdFunc);
 *
 *
 * $em->fireEvent("type_one");
 * $em->fireEvent("type_two");
 */
class EventManager implements IEventManager 
{
    /**
     * 
     * [
     *     "type_one" => [
     *         [0] => callable $callback,
     *         [1] => callable $callback
     *         ...
     *     ],
     * 
     * 
     * ]
     *
     * @var array
     */
    private $events = [];
    
    public function addEventListener($type, callable $callback){
        if(!is_string($type)){
            throw new \Exception('First argument must be a string');
        }
        $this->events[$type][] = $callback;
    }

    public function fireEvent($type){
        $ev = $this->events[$type];
        foreach($ev as $callbeck){
            if(!is_callable($callbeck)){
                throw new \Exception('Function is not collable in event type name:' . $type);
            }
            call_user_func($callbeck);
        }
    }
}