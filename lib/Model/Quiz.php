<?php

namespace Model;

class Quiz
{
  public int $n1 = 0;
  public int $n2 = 0;

  public function __construct()
  {
    $this->n1 = Quiz::generateNumber();
    $this->n2 = Quiz::generateNumber();
  }

  private function getAnswer()
  {
    return $this->n1 + $this->n2;
  }

  public function checkAnswer(int $answer)
  {
    return $answer === $this->getAnswer();
  }

  public function __toString()
  {
    return "{$this->n1} + {$this->n2}";
  }

  private static function generateNumber()
  {
    return random_int(0, 20);
  }
}
