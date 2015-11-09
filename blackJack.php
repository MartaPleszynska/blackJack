<?php
/**
 * Created by PhpStorm.
 * User: marta pleszynska
 * Date: 04/11/15
 * Time: 14:50
 *
 * Description: The aim of the game is to accumulate a higher point total than the dealer,
 * but without going over 21. You compute your score by adding the values of your individual cards.
 * The cards 2 through 10 have their face value, J, Q, and K are worth 10 points each,
 * and the Ace is worth either 1 or 11 points (player's choice).
 */
/**
 * creates a pack of 52 cards
 * @return Array $pack
 */
function createPack()
{
    $cards = [];
    $faces = array('Ace', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'Jack', 'Queen', 'King');
    $suits = ['heart', 'spade', 'diamond', 'club'];
    foreach ($suits as $suit) {
        foreach ($faces as $face) {
            $cards[] = array('suit' => $suit, 'face' => $face);
        }
    }
    return $cards;
}

/**
 * selects one random card from a pack if pack is not empty
 * and then removes it from a pack
 * @param Array $cards
 * @return Array  $card   contains suit value and face value
 */
function selectRandomCard(&$cards)
{
    $card = [];
    if (!empty($cards)) {
        $randomCardIndex = array_rand($cards);
        $card = $cards[$randomCardIndex];
        unset ($cards[$randomCardIndex]);
    }
    return $card;
}
//TODO:remove unset function from selectRandomCard and put in different function
/**
 * stores a value of randomly picked card
 * @param  Array $card contains suit value and face value
 * @return mixed           face value of the card int or string
 */
function checkCardValue($card)
{
    return $card['face'];
}

/**
 * stores a suit of randomly picked card
 * @param Array $card contains suit value and face value
 * @return String         suit of the card int or string
 */
function checkCardSuit($card)
{
    return $card['suit'];
}

/**
 * adds card value to exiting score
 * @param mixed $randomCard value of randomly selected card (int or
 *                             string)
 * @param Integer $score total sum of randomly picked cards so far
 *                             in none card selected default to zero
 * @return int    $score       total sum of randomly picked cards so far
 */
function checkScore($randomCard, $score = 0)
{
    if ($randomCard == 'Ace') {
        $randomCard = selectAceValue($score);
    }
    if
    (
        $randomCard == 'Jack' ||
        $randomCard == 'Queen' ||
        $randomCard == 'King'
    )
    {
        $randomCard = 10;
    }
    $score += $randomCard;
    return $score;
}

/**
 * picks two random cards from a pack and check their scores
 * @param  Array $cards pack of 52 cards
 * @return Array $result    face and value of first wo random cards and a
 * total score
 */
function deal($cards)
{
    $firstRandomCard = selectRandomCard($cards);
//    $score = checkScore($randomCard['face']);
    $score = checkScore(checkCardValue($firstRandomCard));
    $secondRandomCard = selectRandomCard($cards);
//    $score = checkScore($randomCard['face'], $score);
    $score = checkScore(checkCardValue($secondRandomCard), $score);
    $result = array(
        'firstRandomCard' => $firstRandomCard,
        'secondRandomCard' => $secondRandomCard,
        'score' => $score
    );
    return $result;
}

/**
 * pick value for Ace: 11 by default, 1 if sum of 11 and current score is
 * more than 21
 * @param   Integer $score current score
 * @return  Integer    $value    Ace value
 */
function selectAceValue($score)
{
    $value = 11;
    if (($score + $value) > 21) {
        $value = 1;
    }
    return $value;
}

/**
 * displays a message when a game ends
 * @param   Integer $score total score in a game
 * @return  String     $message  appropriate message depending on result of
 * the game
 */
function displayMessage($score)
{
    $message = '';
    if ($score == 21) {
        $message = 'Your score is ' . $score . '. Congratulation! You have
        won!';
    }
    if ($score > 21) {
        $message = 'Your score is ' . $score . '. Loser!!!';
    }
    return $message;
}

//TODO: wrap below into function generateGameOfBlackJack()
$cards = createPack();
$result = deal($cards);
$score = $result['score'];
$firstRandomCard = $result['firstRandomCard'];
$secondRandomCard = $result['secondRandomCard'];
$firstRandomCardValue = checkCardValue($firstRandomCard);
$secondRandomCardValue = checkCardValue($secondRandomCard);
$firstRandomCardSuit = checkCardSuit($firstRandomCard);
$secondRandomCardSuit = checkCardSuit($secondRandomCard);
//echo 'Your first random card is ' . $firstRandomCardValue . ' of ' .
//    $firstRandomCardSuit . ".\r\n<br/>";
//echo 'Your second random card is ' . $secondRandomCardValue . ' of ' .
//    $secondRandomCardSuit . ".\r\n<br/>";
//echo 'Your beginning score is ' . $score . '.' . "\r\n<br/>";
$cardMessage = '';
$scoreMessage = '';
while ($score < 21) {
    $card = selectRandomCard($cards);
    $score = checkScore(checkCardValue($card), $score);
    $cardMessage .= 'Your next random card is ' . checkCardValue($card) . ' of ' .
        checkCardSuit
        ($card) . '.' . "\r\n";
    $scoreMessage .= 'Your score is ' . $score . '.' . "\r\n";
}
//echo displayMessage($score);

