<?php

class AI
{
    public static function process($text)
    {
        $result = [
            'gender' => self::getGender($text),
            'sentiment' => self::getSentiment($text),
            'rude_words' => self::getRudeWords($text),
            'languages' => self::getLanguages($text),
        ];
        return $result;
    }

    /**
     * @return string 'Male' or 'Female' or 'Unknown'
     */
    public static function getGender($text)
    {
        if(strpos($text,'คะ')!==false || strpos($text,'ค่ะ')!==false || strpos($text,'ฉัน')!==false || strpos($text,'หนู')!==false)
            return 'Female';
        else if(strpos($text,'คับ')!==false || strpos($text,'ครับ')!==false || strpos($text,'ผม')!==false)
            return 'Male';
        else
            return 'Unknown';
    }

    /**
     * @return string 'Positive' or 'Neutral' or 'Negative'
     */
    public static function getSentiment($text)
    {

        if(strpos($text,'ไม่ดี')!==false || strpos($text,'bad')!==false || strpos($text,'เลว')!==false || strpos($text,'fuck')!==false)
            return 'Negative';
        else if(strpos($text,'ดี')!==false || strpos($text,'good')!==false || strpos($text,'เยี่ยม')!==false || strpos($text,'สุดยอด')!==false)
            return 'Positive';
        else
            return 'Neutral';
    }

    /**
     * @return array of all rude words in Thai
     */
    public static function getRudeWords($text)
    {
         $result = [];
         $rudeword[]=("เหี้ย","ไม่ดี","เลว","กาก","ควย","สัส");
         for($i=0;$i<sizeof($rudeword);$i++){
            if(strpos($text,$rudeword[$i])!==false){
                array_push($result,[$rudeword[$i]]);
             }
         }
         return $result;
            

    }

    /**
     * @return array of languages (TH, EN)
     */
    public static function getLanguages($text)
    {
        
        $result = [];
        $re = '/[ก-๛]+/u';
        preg_match_all($re, $text, $matches, PREG_SET_ORDER, 0);
        if (!empty($matches)) {
            array_push($result, 'TH');
        }
        $re2 = '/[a-zA-Z]+/u';
        preg_match_all($re2, $text, $matches, PREG_SET_ORDER, 0);
        if (!empty($matches)) {
            array_push($result, 'EN');
        }
        
        return $result;
    }
}
