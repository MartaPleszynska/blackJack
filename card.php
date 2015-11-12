<?php
/**
 * Created by PhpStorm.
 * User: martapleszynska
 * Date: 09/11/15
 * Time: 10:23
 */

/**
 * class Card
 *
 * A class for a card object, has a face, suit, description and value properties
 * description depends on card's face and suit
 * value depends on card's face
 *
 * instantiated by giving face and suit
 * when instantiated description and value needs to be set accordingly
 */
class Card
{
    /**
     * @var mixed $face describes face of a card
     */
    public $face;
    /**
     * @var String $suit describes a suit of a card
     */
    public $suit;
    /**
     * @var String $description constructed accordingly to card's face and suit example: "2 of Diamonds"
     */
    public $description;
    /**
     * @var Integer $value cards value accordingly to its face
     */
    public $value;

    /**
     * construct new card when given face and suit
     * sets its description and its value
     *
     * @param mixed  $face face of a card
     * @param String $suit suit of a card
     */
    public function __construct($face, $suit)
    {
        $this->face = $face;
        $this->suit = $suit;
        $this->setDescription();
        $this->setValue();
    }

    /**
     * sets card description accordingly to its face and suit
     */
    public function setDescription()
    {
        $this->description = $this->face . ' of ' . $this->suit;
    }

    /**
     * sets card value accordingly to its face
     */
    public function setValue()
    {
        if
        (
            $this->face == 'Jack' ||
            $this->face == 'Queen' ||
            $this->face == 'King'
        ) {
            $this->value = 10;
        } elseif ($this->face == 'Ace') {
            $this->value = array(1, 11);
        } else {
            $this->value = $this->face;
        }
    }

}