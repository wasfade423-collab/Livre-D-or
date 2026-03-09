<?php
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $error = [];
        if(isset($_POST['nom']) && !empty($_POST['nom'])){
            $nom = htmlspecialchars(strip_tags($_POST['nom']));
        }else{
            $error['nom'] = "Nom non renseigné.";
        }

        if(isset($_POST['message']) && !empty($_POST['message'])){
            $message = htmlspecialchars(strip_tags($_POST['message']));
        }else{
            $error['message'] = "Message non renseigné.";
        }

        if(empty($error)){
            $file = "livre.txt";
            $data = "$nom : $message \n";
            if($buffer = fopen($file, 'a+')){
                fputs($buffer, $data);
                fclose($buffer);
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'or</title>
    <style>
        form{
            border: 1px solid gray;
            border-radius: 8px;
            padding: 7px;
            margin-top: 15vh;
            width: 85vw;
            margin-left: auto; 
            margin-right: auto; 
            display: flex;
            flex-direction: column;
            gap: 2px;
            font-size: 1.4rem;
            justify-content: center;
            font-family: sans-serif;
            align-items: center;
            box-shadow: 0px 0px 8px 8px rgba(0, 0, 0, 0.1); 
        }
        h2{
            text-align: center;
            margin: 0px;
            padding: 0px;
            margin-bottom: 7px;
        }
        .form{
            margin: 8px auto;
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 4px;
            justify-content: center;
            align-items: center;
        }
        .error{
            color: red;
            font-size: 0.8rem; 
            margin: 0px;
            padding: 0px;
            width: 100%;
            text-align: center;
        }
        .action{
            display: flex;
            gap: 7px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 90%;
            margin: 0px auto;
            margin-top: 45px;
        }
        .action button{
            cursor: pointer;
            padding: 4px;
            background-color: goldenrod;
            border-radius: 10px;
            color: white;
            border: none;
            font-weight: bold;
            width: 90%;
            font-size: 1.8rem;
        }
        a{
            color: white;
            width: 100%;
            text-decoration: none;
            display: block;
        }
        input, textarea{
            outline: none;
            padding: 0px 6px;
            border-radius: 5px;
            border: 1px solid gainsboro;
            resize:vertical;
        }
    </style>
</head>
<body>
    <form action="" method ="post">
        <h2>Plateforme du livre d'Or</h2>
        <div class="form">
            <div style="width: 100%; display: flex; gap: 2; width: 90%;">
                <label for="nom" style="margin-right: 10px; width: 50%;">Nom </label>
                <input type="text" id="nom" name="nom" value="<?= @$nom ?>" style="width: 50%;">
            </div>
            <div class="error">
                <?= @$error['nom'] ?>
            </div>
            
            <div style="width: 100%; display: flex; gap: 2; width: 90%;">
                <label for="message" style="margin-right: 10px; width: 50%;">Message</label>
                <textarea name="message" id="message" rows = "2" style="width: 50%;"><?= @$message ?></textarea>
            </div>
            <div class="error">
                <?= @$error['message'] ?>
            </div>
            <div class="action" style="width: 100%">
                <button type="submit">Envoyer</button>
                <button type="button"><a href="liste.php">Consulter</a></button>
            </div>
        </div>
    </form>
</body>
</html>