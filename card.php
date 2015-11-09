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
 */
class Card
{
    public $face;
    public $suit;
    public $description;

    /**
     * construct new card
     * @param mixed   $face   face of a card
     * @param String  $suit   suit of a card
     */
    public function __construct ($face, $suit)
    {
        $this->face = $face;
        $this->suit = $suit;
        $this->setDescription();
    }

    /**
     * set card description
     */
    public function setDescription()
    {
        if ($this->face == 2) {
            $this->description = 'Two of ' . $this->suit;
        }

    }

}