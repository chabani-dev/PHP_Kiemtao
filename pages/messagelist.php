<?php
$sql="SELECT body,date_publication, name,passions FROM message LEFT JOIN utilisateur ON 
author_id=utilisateur.id";
$result=$pdo->query($sql);
$messageList=$result->fetchAll(PDO::FETCH_CLASS);
var_dump($messageList);

//todo il va falloir dynamiser tout ça... commençons par récupérer les messages et les utilisateurs dans la bdd avant.
?>
<section>
    <h2>#kiemtao <a href="addMessage.php" class="addmessage"><span>+</span><em>ajouter&nbsp;un&nbsp;message</em></a></h2>
    <ul id="messages-list">
        <?php foreach($messageList as $message):?>
    <li class="message">
            <h3 title="Passions : <?=$message->passions?>"><?=$message->name?></h3>
            <p><?=$message->body?></p>
            <h4 class="date"><?=date('d/m/Y - H:i',strtotime($message->date_publication))?></h4>
        </li>
        <?php endforeach;?>
    </ul>
</section>