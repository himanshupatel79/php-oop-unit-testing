<?php
/**
 * Created by PhpStorm.
 * User: Himanshu
 * Date: 14/04/2016
 * Time: 09:13
 */

namespace SSDMTechTest;
interface EventInterface
{

    /**
     * Should return the sport type e.g. 'football'
     * @return string
     */
    public function getSport();

    /**
     * Should return the event type e.g. 'kickoff'
     * @return string
     */
    public function getEventType();

    /**
     * @param $team_one
     * @param $team_two
     * @return mixed
     */
    public function getScore($team_one, $team_two);

}