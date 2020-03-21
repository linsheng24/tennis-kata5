<?php
namespace Tests;


use App\Tennis;
use PHPUnit\Framework\TestCase;

class TennisGameTest extends TestCase
{
    private $tennis;

    protected function setUp(): void
    {
        $this->tennis = new Tennis();
    }

    public function test_LoveAll()
    {
        $this->scoreShouldBe('Love-All');
    }

    public function test_FifteenLove()
    {
        $this->tennis->firstPlayerScore();
        $this->scoreShouldBe('Fifteen-Love');
    }

    public function test_ThirtyLove()
    {
        $this->tennis->firstPlayerScore();
        $this->tennis->firstPlayerScore();
        $this->scoreShouldBe('Thirty-Love');
    }

    public function test_ThirtyFifteen()
    {
        $this->tennis->firstPlayerScore();
        $this->tennis->firstPlayerScore();

        $this->tennis->secondPlayerScore();

        $this->scoreShouldBe('Thirty-Fifteen');
    }

    public function test_LoveFifteen()
    {
        $this->tennis->secondPlayerScore();

        $this->scoreShouldBe('Love-Fifteen');
    }

    public function test_3vs3Deuce()
    {
        $this->p1AddScore(3);

        $this->p2AddScore(3);

        $this->scoreShouldBe('Deuce');
    }

    public function test_ThirtyAll()
    {
        $this->p1AddScore(2);

        $this->p2AddScore(2);

        $this->scoreShouldBe('Thirty-All');
    }

    public function test_5vs5Deuce()
    {
        $this->p1AddScore(5);

        $this->p2AddScore(5);

        $this->scoreShouldBe('Deuce');
    }

    public function test_FortyFifteen()
    {
        $this->p1AddScore(3);

        $this->p2AddScore(1);

        $this->scoreShouldBe('Forty-Fifteen');
    }

    public function test_4vs3AdvPlayer1()
    {
        $this->p1AddScore(4);

        $this->p2AddScore(3);

        $this->scoreShouldBe('Advantage Player1');
    }

    public function test_4vs5AdvPlayer2()
    {
        $this->p1AddScore(4);

        $this->p2AddScore(5);

        $this->scoreShouldBe('Advantage Player2');
    }

    public function test_4vs2WinForPlayer1()
    {
        $this->p1AddScore(4);

        $this->p2AddScore(2);

        $this->scoreShouldBe('Win for Player1');
    }

    public function test_4vs6WinForPlayer2()
    {
        $this->p1AddScore(4);

        $this->p2AddScore(6);

        $this->scoreShouldBe('Win for Player2');
    }

    private function scoreShouldBe($expected): void
    {
        $this->assertEquals($expected, $this->tennis->score());
    }

    private function p1AddScore($score)
    {
        for ($i=0; $i< $score; $i++) {
            $this->tennis->firstPlayerScore();
        }
    }

    private function p2AddScore($score)
    {
        for ($i=0; $i< $score; $i++) {
            $this->tennis->secondPlayerScore();
        }
    }

}
