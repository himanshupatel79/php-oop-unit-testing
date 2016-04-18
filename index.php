<?php
/**
 * Created by PhpStorm.
 * User: Himanshu
 * Date: 16/04/2016
 * Time: 06:01
 */
// Using the classes:
require_once __DIR__.'/vendor/autoload.php';

$footballSport = new SSDMTechTest\Football();
$footballSport->getSport();
$footballSport->getEventType();

$footballTeamA = new SSDMTechTest\Football();
$footballTeamB = new SSDMTechTest\Football();

$gallsA = $footballTeamA->goal();
$gallsA += $footballTeamA->goal();

$gallsB = $footballTeamB->goal();
$gallsB += $footballTeamB->goal();
$gallsB += $footballTeamB->goal();

echo '<pre>';
$score = $footballTeamA->getScore($gallsA,$gallsB);

echo $footballSport->win($score);

echo $footballSport->halfTime();
echo $footballSport->checkValidEvent("ball") ? 'process' : 'not process';

$footballSport->store($footballSport);
print_r($footballSport);