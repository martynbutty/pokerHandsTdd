<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PokerHandsSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('PokerHands');
    }

    public function it_scores_a_hand()
    {
        $this->scoreHand('2H 3D 5S 9C KD')->shouldReturn(13);
    }

    public function it_will_compare_hands()
    {
        $this->compareHands('2H 3D 5S 9C KD', '2C 3H 4S 8C AH')->shouldReturn('White wins');
    }
}
