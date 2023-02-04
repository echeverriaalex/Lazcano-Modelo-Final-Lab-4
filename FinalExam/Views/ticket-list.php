<?php
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Tickets</h2>
               <table class="table bg-light-alpha">
                    <thead>                         
                         <th>Tipo</th>
                         <th>Fecha</th>
                         <th>Nombre</th>
                         <th>Email</th>
                         <th>Acción</th>
                    </thead>
                    <tbody>
                    <?php 
                         foreach($ticketsList as $ticket){
                    ?>
                         <tr>
                              <?php
                              foreach($ticketsTypeList as $ticketType){
                                   if($ticketType->getTickettypeid() == $ticket->getTickettypeid()){
                              ?>
                                   <td><?php echo $ticketType->getDescription(); ?></td>
                              <?php
                                   }
                              }
                              ?>
                              <td><?= $ticket->getDate() ?></td>
                              <td><?= $ticket->getName() ?></td>
                              <td><?= $ticket->getEmail() ?></td>

                              <td>
                                   <form method="POST" action="<?php echo FRONT_ROOT?>Tickets/Delete" >
                                        <input type="hidden" name="ticketId" value="<?php echo $ticket->getTicketid(); ?>">
                                        
                                        <!-- 
                                             <a href="<?=FRONT_ROOT?>Tickets/delete" class="btn btn-danger" role="button" aria-pressed="true">Eliminar</a>
                                        -->
                                        <button type="submit" class="btn btn-danger"> Eliminar </button>
                                   </form>                      
                              </td>
                         </tr>
                    <?php 
                         } 
                    ?>
                    </tbody>
               </table>
          </div>
     </section>
</main>