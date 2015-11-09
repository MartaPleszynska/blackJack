<?php

/**
 * Created by PhpStorm.
 * User: martapleszynska
 * Date: 09/11/15
 * Time: 09:57
 */
require 'card.php';

class CardTest extends PHPUnit_Framework_TestCase
{
    public function test_has_a_face()
    {
        $card = new Card('10', 'diamond');
        $this->assertEquals(10, $card->face);
    }

    public function test_has_a_face2()
    {
        $card = new Card('2', 'diamond');
        $this->assertEquals(2, $card->face);
    }

    public function test_has_a_suit()
    {
        $card = new Card('2', 'diamond');
        $this->assertEquals('diamond', $card->suit);
    }

    public function test_has_a_description()
    {
        $card = new Card('2', 'Diamonds');
        $this->assertEquals('Two of Diamonds', $card->description);
    }

    /**
     * @param $face
     * @param $suit
     * @param $ouput
     * @dataProvider descriptionProvider
     */
    public function test_face_description($face, $suit, $ouput)
    {
        $card = new Card($face, $suit);
        $this->assertEquals($output, $face);

    }

    public static function descriptionProvider()
    {
        $test = [
            [2, 'Two'],
            [3, 'Three'],
            [4, 'Four'],
            [5, 'Five'],
            [6, 'Six'],
            [7, 'Seven'],
            [8, 'Eight'],
            [9, 'Nine'],
            [10, 'Ten']
        ];
        return $test;
    }
