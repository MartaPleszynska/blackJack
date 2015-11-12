<?php
/**
 * Created by PhpStorm.
 * User: martapleszynska
 * Date: 09/11/15
 * Time: 10:23
 */

/**
 * class Card

 */
class Card
{
    public $face;
    public $suit;
    public $description;
    public $value;

    /**
     * construct new card
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
     * set card description
     */
    public function setDescription()
    {
        $this->description = $this->face . ' of ' . $this->suit;
    }

    /**
     * set card value
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