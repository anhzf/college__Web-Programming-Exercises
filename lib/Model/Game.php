<?php

namespace Model;

use Auth\Auth;

class Game
{
  public const initial_lives = 5;
  public const initial_score = 0;

  private static $instance = null;
  private $id = null;
  private $userId = null;
  private $lives = Game::initial_lives;
  private $score = Game::initial_score;
  private $quiz = null;

  private function __construct()
  {
    $this->userId = Auth::user()->id;
    $this->saveGameStats();
  }

  public function getGameId()
  {
    return $this->id;
  }

  public function getUserId()
  {
    return $this->userId;
  }

  public function getLives()
  {
    return $this->lives;
  }

  public function getScore()
  {
    return $this->score;
  }

  public function getCurrentQuiz()
  {
    return $this->quiz ?? $this->newQuiz();
  }

  public function newQuiz()
  {
    return $this->quiz = new Quiz();
  }

  public function resetQuiz()
  {
    return $this->quiz = null;
  }

  public function onRightAnswer()
  {
    $this->score += 10;
    $this->newQuiz();
  }

  public function onWrongAnswer()
  {
    $this->lives -= 1;
    $this->score -= 2;
  }

  public function hasChanges()
  {
    return !(($this->lives === Game::initial_lives)
      && ($this->score === Game::initial_score));
  }

  public static function resetInstance()
  {
    // reset only when no changes in instance and instance has different userId with current user
    if (
      Game::$instance->hasChanges()
      && (Game::$instance->getUserId() === Auth::user()->id)
    ) {
      Game::$instance = null;
    }
  }

  public static function getInstance()
  {
    return Game::$instance;
  }

  /**
   * Store new game to database
   **/
  private function saveGameStats()
  {
    $conn = \Db\getConnection();

    if ($stmt = $conn->prepare("INSERT INTO game (player_id, score) VALUES (?, ?)")) {
      $stmt->bind_param('ii', $this->userId, $this->score);

      $this->id = $stmt->execute() ? $stmt->insert_id : null;

      $stmt->close();
    }
  }

  /**
   * Update current instance game stats
   **/
  public function updateGameStats()
  {
    $conn = \Db\getConnection();

    if ($stmt = $conn->prepare("UPDATE game SET score = ? WHERE id = ?")) {
      $stmt->bind_param('ii', $this->score, $this->id);

      $stmt->execute();
      $stmt->close();
    }
  }


  public function syncToDb()
  {
    $conn = \Db\getConnection();

    if ($stmt = $conn->prepare("SELECT score FROM game WHERE id = ? LIMIT 1")) {
      $stmt->bind_param('i', $this->id);
      $stmt->execute();

      $stmt->bind_result($this->score);
      $stmt->fetch();

      $stmt->close();
    }
  }

  public static function loadFromSessionOrNew()
  {
    if (Auth::user()) {
      if (
        isset($_SESSION['game'])
        && ($_SESSION['game'] instanceof Game)
        && ($_SESSION['game']->getUserId() === Auth::user()->id)
      ) {
        Game::$instance = $_SESSION['game'];
        Game::$instance->syncToDb();
      } else {
        Game::$instance = new Game();
      }

      return Game::$instance;
    }

    return null;
  }

  public static function getTop10()
  {
    $conn = \Db\getConnection();
    $data = [];
    $query = "SELECT player.username as username, game.score as score
    FROM game
    INNER JOIN player ON game.player_id = player.id
    ORDER BY score DESC
    LIMIT 10";

    if ($stmt = $conn->prepare($query)) {
      $stmt->execute();
      $stmt->bind_result($username, $score);

      while ($stmt->fetch()) {
        array_push($data, compact('username', 'score'));
      }

      $stmt->close();
    }

    return $data;
  }

  public function __destruct()
  {
    // update to database
    $this->updateGameStats();
    // update instance to session
    $_SESSION['game'] = Game::$instance;
  }
}
