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
        $this->assertEquals('2 of Diamonds', $card->description);
    }

    public function test_card_Value_Jack()
    {
        $card = new Card('Jack', 'Diamonds');
        $this->assertEquals(10, $card->value);
    }

    public function test_card_Value_King()
    {
        $card = new Card('King', 'Diamonds');
        $this->assertEquals(10, $card->value);
    }

    public function test_card_Value_Queen()
    {
        $card = new Card('Queen', 'Diamonds');
        $this->assertEquals(10, $card->value);
    }

    public function test_card_Value_Ace11()
    {
        $card = new Card('Ace', 'Diamonds');
        $expected = array(1, 11);
        $this->assertEquals($expected, $card->value);
    }

    /**
     * @param $face
     * @param $suit
     * @param $description
     *
     * @dataProvider dataProvider
     */
    public function test_card_desription($face, $suit, $description)
    {
        $card = new Card($face, $suit);
        $expected = $card->description;
        $this->assertEquals($expected, $description);
    }

    public static function dataProvider()
    {
        $tests = [
            [2, 'Diamonds', '2 of Diamonds'],
            [3, 'Clubs', '3 of Clubs'],
            ['Ace', 'Hearts', 'Ace of Hearts']
        ];
        return $tests;
    }

    /**
     * @param $face
     * @param $suit
     * @param $value
     *
     * @dataProvider dataProvider2
     */
    public function test_card_values($face, $suit, $value)
    {
        $card = new Card($face, $suit);
        $expected = $card->value;
        $this->assertEquals($expected, $value);
    }

    public static function dataProvider2()
    {
        $tests = [
            [2, 'Diamonds', 2],
            ['Jack', 'Clubs', 10],
            ['Queen', 'Clubs', 10],
            ['King', 'Clubs', 10],
            ['Ace', 'Clubs', [1, 11]],
        ];
        return $tests;
    }

}

