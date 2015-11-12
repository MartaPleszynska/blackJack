<?php

/**
 * Created by PhpStorm.
 * User: martapleszynska
 * Date: 12/11/15
 * Time: 10:44
 */
require 'deck.php';

class DeckTest extends PHPUnit_Framework_TestCase
{
    public function test_check_if_pack_contains_52cards()
    {
        $deck = new Deck();
        $cards = $deck->createPack();
        $this->assertEquals(52, count($cards));
    }
    public function test_check_num_of_cards_property()
    {
        $deck = new Deck();
        $deck->createPack();
        $this->assertEquals(52, $deck->numberOfCards);
    }
    public function test_shuffle_cards()
    {
        $deck = new Deck;
        $deck->createPack();
        $cards = $deck->cards;
        $deck->shuffleCards();
        $this->assertNotEquals($cards, $deck->cards);
    }

    public function test_pick_random_card()
    {
        $deck = new Deck();
        $deck->createPack();
        $card = $deck->pickACard();
        $this->assertInstanceOf('Card', $card);
    }

    public function test_remove_card()
    {
        $deck = new Deck();
        $deck->createPack();
        $cards = $deck->cards;
        $card = $deck->pickACard();
        $deck = $deck->removeACard($card);
        $this->assertNotEquals($cards, $deck->cards);
    }

    /**
     * @param $numberOfPacks
     * @param $numberOfCards
     *
     * @dataProvider numberOfDecksProvider
     */
    public function test_construct_deck($numberOfPacks, $numberOfCards)
    {
        $deck = new Deck($numberOfPacks);
        $this->assertEquals($numberOfCards, $deck->numberOfCards);
    }
    public static function numberOfDecksProvider(){
        $test = [
            [1, 52],
            [2, 104],

        ];
        return $test;
    }

}
