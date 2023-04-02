
<!-- <a class=btn href="?page=voir">Voir les associations</a> -->
<hr>
<form class="form" action="index.php?page=ActionBDD" method="POST" enctype="multipart/form-data">
  <input type="text" name="projectName" placeholder="Nom du projet">
  <br>
  <input type="text" name="servername" value="localhost" placeholder="Serveur de la Bdd">
  <br>
  <input type="text" name="userBdd" value="root" placeholder="User de la Bdd">
  <br>
  <input type="text" name="passBdd" placeholder="Password de la Bdd">
  <br>
  <input type="text" name="portBdd" value="3306" placeholder="Port de la Bdd">
  <br>
  <input type="file" name="file_excel" value="test.xlsx" placeholder="file_excel">
  <br>
  <input type="text" name="nomBdd" value="personnes" placeholder="Nom de la Bdd">
  <br>
  <input type="text" name="pathFramework" value="C:\wamp64\www" placeholder="Chemin du projet">
  <br>
  <button type="submit">Création</button>
</form>
</body>

</html>