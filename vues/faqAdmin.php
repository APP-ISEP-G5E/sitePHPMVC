<?php include("faq.php");?>

<!--ajouter une question-->

<form method="POST" action="">
    <label for="ajoutQuestion"><br/>Vous pouvez ajouter une question ici : <br/></label>
    <textarea name="ajoutQuestion" class="ajoutQuestion" rows="5" cols="60"></textarea><br/>
    <input type="submit" value="SUBMIT">
</form>
<?php if(isset($_POST['ajoutQuestion']) && $_POST['ajoutQuestion'] !=''){
    $question = htmlspecialchars($_POST['ajoutQuestion']);
    ajouteQuestion($bdd,htmlspecialchars($question));
}
?>

