<?php

namespace Model;

class User
{
  public int $id;
  public string $username;
  public string $email;

  /**
   * Create user instance
   *
   * at this stage user doesn't has primary key
   *
   * @param array $user ['username' => ..., 'email' => ...]
   **/
  public function __construct(array $user)
  {
    // assign all retrieves data
    foreach ($user as $key => $value) {
      $this->{$key} = $value;
    }
    // ensuring username and email are available
    $this->username = $user['username'];
    $this->email = $user['email'];
  }

  /**
   * Save user instance to db

   * @return int return the userId in Db
   **/
  public function save()
  {
    $conn = \Db\getConnection();
    $stmt = $conn->prepare("INSERT INTO player (username, email) VALUES (?, ?)");

    $stmt->bind_param('ss', $this->username, $this->email);

    $this->id = $stmt->execute() ? $stmt->insert_id : null;

    $stmt->close();
    return $this->id;
  }

  public static function getById(int $id)
  {
    $conn = \Db\getConnection();

    if ($stmt = $conn->prepare("SELECT * FROM player WHERE id = ? LIMIT 1")) {
      $stmt->bind_param('i', $id);

      $stmt->execute();

      $stmt->bind_result($playerId, $playerName, $playerEmail);

      $user = $stmt->fetch() ? new User([
        'id' => $playerId,
        'username' => $playerName,
        'email' => $playerEmail,
      ]) : null;

      $stmt->close();
      return $user;
    }

    return null;
  }
}
