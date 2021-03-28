<?php
declare(strict_types =1);
namespace App;  
foreach ($notes as $note)
    {?>
    <section class = "book">
        <h2><?php echo $note['title']; ?>  </h2>
        <p><?php echo $note['description']; ?></p> 
     </section> 
    <?php } ?> 

