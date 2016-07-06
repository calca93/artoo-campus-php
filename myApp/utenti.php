<?php

   require_once './classes/Database.php';
   require_once './classes/Ruolo.php';
   require_once './classes/Utente.php';
   
   $servername = getenv('IP');
   $username = ('marco');
   $pass = 'ZSuXmVMBbbBRuUBx';

   $db = new Database($servername, $username, $pass);
   $db->useDatabase('myApp');
   
   if(count($_POST) > 0)
      $ok = Utente::EliminaUtente($db, $_POST['utenteid']);
      
   $utenti = Utente::getAll($db);
   $title = 'Utenti';


?>
<html>
    <!-- header html -->
    <?php require './html/head.html'; ?>
    <body>

        <!-- barra di navigazione -->
        <?php require './html/navBar.html'; ?>

        <div>

            <p><a href="/myApp/utente.php">Nuovo utente</a></p>

            <!-- errore SQL -->
            <?php if (is_string($utenti)) : ?>

                <div style="color:red;">
                    Impossibile ottenere la lista degli utenti: <?= $utenti; ?>
                </div>

                <!-- lista utenti ok -->
            <?php elseif (is_array($utenti)) : ?>

                <!-- lista utenti piena -->
                <?php if (count($utenti) > 0) : ?>

                    <style>
                        .disabilitato {
                            background: red;
                        }
                    </style>

                    <table>
                        <thead>
                            <tr>
                                <th>Utente</th>
                                <th>Ruolo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($utenti as $value) : ?>
                                <tr class="<?php if ($value->Abilitato == 0) echo 'disabilitato'; ?>">
                                    <td>
                                        <a href="/myApp/utente.php?utenteid=<?= $value->UtenteID; ?>">
                                            <?= $value->NomeUtente; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?= $value->Descrizione; ?>
                                    </td>
                                    <td>
                                        <form action="" method="post">
                                            <input name="utenteid" type="hidden" value="<?= $value->UtenteID; ?>" />
                                            <button class="delete_utente" type="submit">Elimina</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- lista utenti vuota -->
                <?php else : ?>

                    <p><em>Non ci sono utenti nel database...</em></p>

                <?php endif; ?>

            <?php endif; ?>

        </div>
        
        <?php require './cerca_utenti.php'; ?>
    </body>

    <?php
        $file = 'js/utenti.js';
        require_once './html/footer.php';
    ?>

</html>