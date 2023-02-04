<?php
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Agregar Ticket</h2>
               <form class="bg-light-alpha p-5" action="<?=FRONT_ROOT?>Tickets/Add" method="post">
                    <div class="row">                         
                         <div class="col-lg-3">
                              <div class="form-group">
                                   <label for="">Tipo de Request</label>
                                   <select class="form-control" name="ticketTypeId">
                                        <optgroup> 
                                        <option disabled selected>Seleccionar...</option>
                                        <?php 
                                             foreach($ticketsTypeList as $ticketType){ 
                                        ?>
                                                  <option value="<?= $ticketType->getTickettypeid(); ?>" name="ticketTypeId" > <?= $ticketType->getDescription(); ?> </option>
                                        <?php 
                                             }
                                        ?>
                                        </optgroup>
                                   </select>
                              </div>
                         </div>
                         <div class="col-lg-2">
                              <div class="form-group">
                                   <label for="">Fecha</label>
                                   <input type="text" readonly value="<?php echo date("d-M-Y") ?>" name="date" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-3">
                              <div class="form-group">
                                   <label for="">Nombre</label>
                                   <input type="text" value="" name="name" class="form-control">
                              </div>
                         </div>                                
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Email</label>
                                   <input type="text" value="" name="email" class="form-control">
                              </div>
                         </div>                         
                    </div>
                    <div class="row">
                         <div class="col-lg-12">
                              <div class="form-group">
                                   <label for="">Descripción</label>
                                   <textarea type="text" value="" name="description" class="form-control" rows="5"></textarea>
                              </div>
                         </div>
                    </div>
                    <button type="submit"  class="btn btn-dark ml-auto d-block">Agregar</button>
               </form>
          </div>
     </section>
</main>
<?php
    require_once('footer.php');
?>