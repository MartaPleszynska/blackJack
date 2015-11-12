<?php
/**
 * Created by PhpStorm.
 * User: marta pleszynska
 * Date: 12/11/15
 * Time: 10:31
 */

require 'card.php';

/**
 * Class Deck - deck of cards
 */
class Deck
{
    public $numberOfCards; //std 54 with two jokers 52 std
    public $numberOfPacks; //std 1
    public $cards; //array
    //    public $containsJokers = false; //true or false
    public $faces = array('Ace', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'Jack', 'Queen', 'King');
    public $suits = ['heart', 'spade', 'diamond', 'club'];

    public function __construct($numberOfPacks = 1)
    {

        for ($i = 1; $i<=$numberOfPacks; $i++) {
            $deck[] = array($i=>$this->createPack());
        }
        $this->numberOfPacks = $numberOfPacks;
        $this->numberOfCards *= $numberOfPacks;
    }

    public function createPack()
    {
        $cards = [];
        foreach ($this->suits as $suit) {
            foreach ($this->faces as $face) {
                $cards[] = new Card($face, $suit);
            }
        }
        $this->numberOfCards = count($cards);
        $this->cards = $cards;

        return $cards;
    }

    public function shuffleCards()
    {
        shuffle($this->cards);
    }

    public function pickACard()
    {
        $cards = $this->cards;
        $randomCardIndex = array_rand($this->cards);
        return $cards[$randomCardIndex];
    }
    public function removeACard($card)
    {
        $cards = $this->cards;
        $randomCardIndex = array_search($card, $cards);
        unset ($cards[$randomCardIndex]);
    }

}