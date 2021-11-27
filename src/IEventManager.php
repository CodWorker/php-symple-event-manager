<?php

namespace Coder\TestWork1;

interface IEventManager 
{
    public function addEventListener($type, callable $callback);
    public function fireEvent($type);
}