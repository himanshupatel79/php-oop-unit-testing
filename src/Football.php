<?php
/**
 * Created by PhpStorm.
 * User: Himanshu
 * Date: 14/04/2016
 * Time: 10:10
 */
namespace SSDMTechTest;

class Football implements EventInterface, EventStorageInterface
{
    public $start_time = 6000;
    static public $goal = 1;
    public static $half_time = 3000; // 3000 seconds, 45 Minutes
    public $events = array();
    public $event_types = array();
    public $teams = array();

    public function __construct()
    {
        $this->half_time = self::$half_time;
        $this->event_types = array("kickoff", "halftime", "fulltime", "extratime", "yellowcard", "redcard", "penalty", "freekick", "corner", "goal");
        $this->teams = array("A","B");
    }

    /**
     *  Get the Name of Sport
     */
    public function getSport()
    {
        return "Football";
    }

    /**
     * Get Event Type
     */
    public function getEventType()
    {
        return $this->event_types;
    }

    /**
     * @param EventInterface $event
     * @return EventInterface
     * Store Event
     */
    public function store(EventInterface $event)
    {
        return $this->events[] = $event;
    }

    /**
     * Kick Off
     */
    public function kickOff()
    {
        $this->start_time = 0;
        $this->goal = 0;
    }

    /**
     * @param $goal
     */
    static public function goal()
    {
        return self::$goal;
    }

    /**
     * @return bool
     */
    public function yellowCard()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function redCard()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function penalty()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function halfTime()
    {
        if ($this->start_time == $this->half_time) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function fullTime()
    {
        if ($this->start_time == ($this->half_time * 2)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function extraTime()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function freeKick()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function corner()
    {
        return true;
    }

    /**
     * @param $total_goals_of_team_A
     * @param $total_goals_of_team_B
     * @return array
     */
    public function getScore($total_goals_of_team_A,$total_goals_of_team_B )
    {
        return array($this->teams[0]=>$total_goals_of_team_A,$this->teams[1] => $total_goals_of_team_B);
    }

    /**
     * @param $score
     * @return string
     */
    public function win($score)
    {
        if($this->fullTime() && !$this->extraTime()){
            if ($score[$this->teams[0]] < $score[$this->teams[1]]){
                return "Team ".$this->teams[1]. " Won!";
            }elseif($score[$this->teams[0]] > $score[$this->teams[1]]){
                return "Team ".$this->teams[0]. " Won!";
            }else{
              return "Match Draw!";
            }
        }else{
            return "Game is ON!";
        }
    }

    /**
     * @param $event
     * @param bool $strict
     * @return bool
     *  Check Even should be process or not?
     */
    public function checkValidEvent($event, $strict = false)
    {
        $haystack = $this->event_types;
        foreach ($haystack as $item) {
            if (($strict ? $item === $event : $item == $event) ||
                (is_array($item) && $this->checkValidEvent($event, $item, $strict))
            ) {
                return true;
            }
        }
        return false;
    }
}