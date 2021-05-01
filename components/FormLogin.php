<form action="<?= $formAction ?>" method="post">
  <div class="field">
    <label for="formLogin_name" class="label">Masukkan nama: </label>
    <div class="control">
      <input type="text" name="username" placeholder="e.g Alex Smith" id="formLogin_username" class="input">
    </div>
  </div>

  <div class="field">
    <label for="formLogin_email" class="label">Masukkan Email: </label>
    <div class="control">
      <input name="email" type="email" placeholder="e.g. alexsmith@gmail.com" id="formLogin_email" class="input">
    </div>
  </div>

  <div class="field is-grouped">
    <div class="control">
      <button type="submit" class="button is-link">Submit</button>
    </div>
  </div>
</form>
