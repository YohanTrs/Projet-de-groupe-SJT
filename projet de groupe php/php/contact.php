        <?php
        include("header.php");
        ?>
        <main class="contact-container">
            <h1 class="page-title">Formulaire de contact</h1>
            <div class="contact-form">                
                <form class="form">                        
                    <label for="Nom"><h2>Nom</h2></label>
                    <input type="text" id="Nom" name="Nom" required>                   
                    <label for="Prénom"><h2>Prénom</h2></label>
                    <input class="form-input2" type="text" id="Prénom" name="Prénom" required>                                     
                    <label for="E-mail"><h2>Adresse mail</h2></label>
                    <input type="Adresse mail" id="Adresse mail" name="Adresse mail" required>
                    <label for="Objet de la demande"><h2>Objet de la demande</h2></label>
                    <input type="Objet de la demande" id="Objet de la demande" name="Objet de la demande" required>
                    <label for="Message"><h2>Message</h2></label>
                    <textarea name="Message" id="Message" cols="30" rows="10"></textarea>
                    <div class="center-submit">
                        <input class="submit" type="submit" value="Envoyer">
                    </div>
                </form>
            </div>
        </main>
        <?php
        include("footer.php");
        ?>