<?php


namespace App;


class Tennis
{

    /**
     * @var int
     */
    private $p1_score = 0;
    private $p2_score = 0;

    public function score()
    {
        $scoreLookup = [0 => 'Love', 1 => 'Fifteen', 2 => 'Thirty', 3 => 'Forty'];
        $maxPlayerScore = max($this->p1_score, $this->p2_score);

        if ($this->isScoreEqeul()) {
            if ($this->p1_score >= 3) {
                return 'Deuce';
            } elseif ($this->p1_score <= 2) {
                return $scoreLookup[$this->p1_score] . '-All';
            }
        }


        if ($maxPlayerScore >= 4) {

            $adv = $this->p1_score > $this->p2_score ? 'Player1' : 'Player2';
            $score_difference = abs($this->p1_score - $this->p2_score);

            if ($score_difference == 2) {
                return 'Win for ' . $adv;
            } elseif ($score_difference == 1) {
                return 'Advantage ' . $adv;
            }
        }

        return $scoreLookup[$this->p1_score] . '-' . $scoreLookup[$this->p2_score];

    }

    public function firstPlayerScore()
    {
        $this->p1_score ++;
    }

    public function secondPlayerScore()
    {
        $this->p2_score ++;
    }

    /**
     * @return bool
     */
    private function isScoreEqeul(): bool
    {
        return $this->p1_score == $this->p2_score;
    }
}