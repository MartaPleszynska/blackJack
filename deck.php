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
    /**
     * @var int $numberOfCards number of cards in one pack - std 52
     */
    public $numberOfCards;
    /**
     * @var int $numberOfPacks number of packs in a deck - std 1
     */
    public $numberOfPacks;
    /**
     * @var array $cards contains array of card objects
     */
    public $cards;
    /**
     * @var array $faces contains faces for Card object
     */
    public $faces = array('Ace', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'Jack', 'Queen', 'King');
    /**
     * @var array $suits contains suits for Card object
     */
    public $suits = ['heart', 'spade', 'diamond', 'club'];
    //TODO:allow to create jokers card object 2 per std pack (red. black)
    //    public $containsJokers = false; //true or false

    /**
     * constructs a deck depending of number packs passed in
     * sets number of packs property
     * sets number of cards property
     *
     * @param int $numberOfPacks number of packs required to build a deck
     */
    public function __construct($numberOfPacks = 1)
    {

        for ($i = 1; $i <= $numberOfPacks; $i++) {
            $deck[] = array($i => $this->createPack());
        }
        $this->numberOfPacks = $numberOfPacks;
        $this->numberOfCards *= $numberOfPacks;
    }

    /**
     * Creates pack of card object each value of each suit and returns it in an array
     *
     * @return array
     */
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

    /**
     * Shuffles array of cards
     */
    public function shuffleCards()
    {
        shuffle($this->cards);
    }

    /**
     * Picks a random card form cards array and returns am array containing its face and suit
     *
     * @return mixed
     */
    public function pickACard()
    {
        $cards = $this->cards;
        $randomCardIndex = array_rand($this->cards);

        return $cards[$randomCardIndex];
    }

    /**
     * Removes given card from an array of cards
     *
     * @param $card
     */
    public function removeACard($card)
    {
        $cards = $this->cards;
        $randomCardIndex = array_search($card, $cards);
        unset ($cards[$randomCardIndex]);
    }

}