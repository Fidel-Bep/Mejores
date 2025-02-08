
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../../models/conexion/conexion.php';
require_once '../../../models/usuario/amigos/amigos.php';
$amigo=new Amigos();
?>
<style>
     #container{
        background-color: rgba(214, 130, 23, 0.7);
        width: 600px;
        margin: 0px auto;
        margin-top: 40px;
        text-align: center;
        z-index: -100;
        height: auto;
        overflow: scroll;
     }

     #titulo_amigos{
        font-size:30px;
        font-weight: bold;
        margin-top:10px;
     }

     .friend{
            background-color:rgba(183, 120, 38, 0.88);
            
     }

     #abandonar_amistad_a,
     #abandonar_amistad_b{
        text-decoration:none;
        
     }
</style>


    <div id="container">

        
       
        <?php $result=$amigo->verAmigos($_SESSION['usuario']['nick']);?>
        
        <?php if (mysqli_num_rows($result)==0): ;?>
        
           <h2 class="indie-flower-regular">Aún no has agregado ningún amigo</h2>
        
        <?php else: ;?>
        
        <h2 class="indie-flower-regular" id="titulo_amigos">Amigos</h2>
        
        <?php while ($amigo = mysqli_fetch_assoc($result)): ;?>
            <?php if($amigo['nick_usuario']==$_SESSION['usuario']['nick']):; ?>
                 <div class="friend" style="border: 1px solid black; padding: 10px; margin: 10px;">
                 <h3 style="color:beige";><?= $amigo['nick_amigo']; ?></h3>
                 <p><?= $amigo['solicitud_amistad']; ?></p>
                 <p><a href="controllers/usuario/amigos/abandonar.php?amistad=<?=$amigo['nick_amigo']?>" id="abandonar_amistad_a">Abandonar Amistad</a></p>
             </div>
            <?php else:; ?>

                <div class="friend" style="border: 1px solid black; padding: 10px; margin: 10px;">
                <h3><?= $amigo['nick_usuario']; ?></h3>
                <p><?= $amigo['solicitud_amistad']; ?></p>
                <p><a href="controllers/usuario/amigos/abandonar.php?amistad=<?=$amigo['nick_usuario']?>" id="abandonar_amistad_b">Abandonar Amistad</a></p>
                </div>
           <?php endif; ?>
        <?php endwhile; ?>
        <?php endif; ?>


    
    </div>
    

