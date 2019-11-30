<?php include("faq.php");?>

<!--ajouter une question-->
<div class="parametrer">
    <div>
    <form method="POST" action="">
        <label for="ajoutQuestion"><br/>Vous pouvez ajouter une question ici : <br/></label>
        <textarea name="ajoutQuestion" class="ajoutQuestion" rows="5" cols="60"></textarea><br/>
        <input type="submit" value="SUBMIT">
    </form>
    </div>
    <?php if(isset($_POST['ajoutQuestion']) && $_POST['ajoutQuestion'] !=''){
        $question = htmlspecialchars($_POST['ajoutQuestion']);
        ajouteQuestion($bdd,$question);
    }
    ?>
    <div>
    <form method="POST" action="">
        <label for="ajoutReponse"><br/>Vous pouvez ajouter une réponse ici : <br/></label>
        <input type="number"  name="numeroQuestion" min="1" placeholder="Numéro de la question" required/><br/>
        <textarea name="ajoutReponse" class="ajoutReponse" rows="5" cols="60"></textarea><br/>
        <input type="submit" value="SUBMIT">
    </form>
    </div>
    <?php if(isset($_POST['ajoutReponse']) && $_POST['ajoutReponse'] !='' && isset($_POST['numeroQuestion'])){
        $reponse= htmlspecialchars($_POST['ajoutReponse']);
        modifierReponse($bdd,$_POST['numeroQuestion'],$reponse);
    }
    ?>
</div>
