<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
  <label for="inputGuess">Bilangan tebakan anda: </label>
  <input type="number" name="guessNumber" id="inputGuess" placeholder="tebakan anda" required>

  <button type="submit" name="submitGuess">Tebak</button>
</form>
