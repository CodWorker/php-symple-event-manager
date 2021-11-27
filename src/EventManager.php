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
     * Example:
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

    /**
     * fireEvent function
     *
     * @param string $type
     * @return void
     */
    public function fireEvent($type){
        if(!is_string($type)){
            throw new \Exception('First argument must be a string');
        }

        $ev = $this->getEvents();

        if (!array_key_exists($type, $ev)) {
            return;
        }

        foreach($ev[$type] as $callbeck){
            if(!is_callable($callbeck)){
                throw new \Exception('Function is not collable in event type name:' . $type);
            }
            call_user_func($callbeck);
        }
    }

    /**
     * Get ]
     *
     * @return  array
     */ 
    public function getEvents()
    {
        return $this->events;
    }

}