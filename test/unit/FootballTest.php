<?php
/**
 * Created by PhpStorm.
 * User: Himanshu
 * Date: 18/04/2016
 * Time: 12:04
 */

class FootballTest extends PHPUnit_Framework_TestCase {

    public function setUp(){}
    public function tearDown(){}

    /**
     * Test case to verify game of football
     */
    public function testGetSport(){
        $footballSport = new SSDMTechTest\Football();
        $this->assertEquals('Football', $footballSport->getSport());
    }

    /**
     * Test case to check Return Type of getEventType and number of event available in the game.
     */
    public  function testGetEventTypes(){
        $footballSport = new SSDMTechTest\Football();
        $this->assertInternalType('array',$footballSport->getEventType());
        $this->assertEquals(10,count($footballSport->getEventType()));
    }

    /**
     * Test case to check return type of various events
     */
    public  function  testReturnType(){
        $footballSport = new SSDMTechTest\Football();
        $this->assertInternalType('boolean',$footballSport->yellowCard());
        $this->assertInternalType('boolean',$footballSport->redCard());
        $this->assertInternalType('boolean',$footballSport->penalty());
        $this->assertInternalType('boolean',$footballSport->extraTime());
        $this->assertInternalType('boolean',$footballSport->freeKick());
        $this->assertInternalType('boolean',$footballSport->corner());
    }

    /**
     * Test case to check weather event should process or not.
     */
    public  function testEventsTypes(){
        $footballSport = new SSDMTechTest\Football();
        $this->assertEquals('process', $footballSport->checkValidEvent("kickoff") ? 'process' : 'not process');
    }

    /**
     * Test case for to test verify various parameter and result of Score and result of match
     */
    public  function testScoreAndWin(){
        $footballTeamA = new SSDMTechTest\Football();
        $footballTeamB = new SSDMTechTest\Football();

        $goalA = $footballTeamA->goal();
        $goalA += $footballTeamA->goal();
        ///Test 2 goals of team A
        $this->assertEquals(2, $goalA);

        $goalB = $footballTeamB->goal();
        $goalB += $footballTeamB->goal();
        $goalB += $footballTeamB->goal();
        //Test 3 goals of team B
        $this->assertEquals(3, $goalB);

        //Test return type and count of getScore
        $score = $footballTeamA->getScore($goalA,$goalB);
        $this->assertInternalType('array',$score);
        $this->assertEquals(2,count($score));

        //Test return type of win
        $footballSport = new SSDMTechTest\Football();
        $this->assertInternalType('string',$footballSport->win($score));

        //Test case to verify Team B Won the game with 3 galls
        $this->assertEquals("Team B Won!",$footballSport->win($score));
    }

}