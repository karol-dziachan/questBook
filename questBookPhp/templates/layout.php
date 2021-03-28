<!DOCTYPE html>
<html>
<head>
<title>Księga gosci</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
  <link href="/public/style.css" rel="stylesheet">
</head>
<body>
<h1>Księga gości</h1>
    <form action="/?action=add" method="post">
      <fieldset>
          <legend>Zostaw po sobie ślad</legend>
          <label>Twoja nazwa: </label>
          <input type="text" name="author"  required placeholder="Jan Kowalski">

          <div>
              <label>Treść wiadomości</label>
          </div>
          <div>
              <textarea name="description"  cols="80" rows="20" placeholder="Zacznij pisać..." required></textarea>
          </div>
          <a href="/?action=add">
            <button>Dodaj się</button> 
            </a>
      </fieldset>
    </form>

    <div class ="content">
    <h1>Wyswietlanie </h1>

    <?php include_once("templates/usersNotes.php")?>
    </div>

    </section>
</c:forEach>

</body>
</html>