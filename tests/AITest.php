<?php

use PHPUnit\Framework\TestCase;

final class AITest extends TestCase
{
    public function testGender_Male(): void
    {
        $result = AI::getGender('สวัสดีครับ');
        $expected_result = 'Male';
        $this->assertEquals($expected_result, $result);
    }
    public function testGender_Female(): void
    {
        $result = AI::getGender('สวัสดีค่ะ');
        $expected_result = 'Female';
        $this->assertEquals($expected_result, $result);
    }
    public function testGender_Unknown(): void
    {
        $result = AI::getGender('');
        $expected_result = 'Unknown';
        $this->assertEquals($expected_result, $result);
    }
    public function testSentiment_Negative(): void
    {
        $result = AI::getSentiment('ไม่ดี');
        $expected_result = 'Negative';
        $this->assertEquals($expected_result, $result);
    }
    public function testSentiment_Positive(): void
    {
        $result = AI::getSentiment('เยี่ยม');
        $expected_result = 'Positive';
        $this->assertEquals($expected_result, $result);
    }
    public function testSentiment_Neutral(): void
    {
        $result = AI::getSentiment('');
        $expected_result = 'Neutral';
        $this->assertEquals($expected_result, $result);
    }

    public function testgetLanguages_TH(): void
    {
        $result = AI::getLanguages('ก');
        $expected_result = ['TH'];
        $this->assertEquals($expected_result, $result);
    }
    public function testgetLanguages_EN(): void
    {
        $result = AI::getLanguages('a');
        $expected_result = ['EN'];
        $this->assertEquals($expected_result, $result);
    }
    public function testgetLanguages_TH_EN(): void
    {
        $result = AI::getLanguages('aก');
        $expected_result = ['EN','TH'];
        $this->assertEquals($expected_result, $result);
    }
   
}