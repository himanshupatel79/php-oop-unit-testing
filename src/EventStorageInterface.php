<?php
/**
 * Created by PhpStorm.
 * User: Himanshu
 * Date: 14/04/2016
 * Time: 09:16
 */
namespace SSDMTechTest;
interface EventStorageInterface
{
    /**
     * Stores an event
     * @param  EventInterface $event
     * @return boolean
     */
    public function store(EventInterface $event);

}