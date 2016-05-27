<?php

class PokerHands
{
    public function scoreHand($hand)
    {
        $cards = explode(' ', $hand);
        $highCard = 0;
        foreach ($cards as $card) {
            $cardScore = $this->scoreCard($card);
            if ($cardScore > $highCard) {
                $highCard = $cardScore;
            }
        }
        
        return $highCard;
    }

    public function scoreCard($argument1)
    {
        $score = 0;
        $cardValue = substr($argument1, 0, 1);
        if (ctype_digit($cardValue)) {
            $score += (int)$cardValue;
        } else {
            switch ($cardValue) {
                case 'J':
                    $score += 11;
                    break;
                case 'Q':
                    $score += 12;
                    break;
                case 'K':
                    $score += 13;
                    break;
                case 'A':
                    $score += 14;
                    break;
                default:
            }
        }

        return $score;
    }

    public function compareHands($argument1, $argument2)
    {
        $blackScore = $this->scoreHand($argument1);
        $whiteScore = $this->scoreHand($argument2);

        if ($blackScore > $whiteScore) {
            return 'Black wins';
        }
        if ($whiteScore > $blackScore) {
            return 'White wins';
        }
        if ($blackScore === $whiteScore) {
            return 'Tie';
        }
        return 'Ooops';
    }
}
