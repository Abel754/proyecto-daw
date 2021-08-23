<?php

function showSweetAlert($value) { ?>
    <?php if(isset($value)) : ?>
        <?php if($value == 1) : ?> <!-- Alert positiva -->
            <script>
                Swal.fire({
                    title: 'Perfecte',
                    text: 'S ha completat amb èxit'!',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    position: 'center'
                })
            </script> 
         <?php elseif ($value == 2) : ?> <!-- Alert error -->
            <script>
              Swal.fire({
                icon: 'error',
                title: 'Vaja...',
                text: 'No s ha pogut completar la operació amb èxit',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                position: 'center'
              })
            </script> 
         <?php elseif ($value == 3) : ?> <!-- Alert info -->
            <script>
                Swal.fire({
                    title: '<strong>Descobrir receptes</strong>',
                    icon: 'info',
                    html:
                        'Aquí podràs filtrar per <strong>plat</strong> i disposes d un <strong>buscador</strong> amb el que podràs buscar receptes que t interessin.' +
                        '<br><br><a href="index.php?controller=ControllerRecepta&action=receta">O bé pots escriure la teva pròpia recepta</a>',
                    showCloseButton: true,
                    focusConfirm: false,
                    confirmButtonText: 'Adelante!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false
                })
            </script>
        <?php elseif ($value == 4) : ?> <!-- Alert confirmació -->
            <script>
                Swal.fire({
                icon: 'error',
                title: 'Vaja......',
                text: 'Introdueix una contrasenya de mínim 6 caràcters!',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                position: 'center'
              })
            </script>
        <?php endif; ?>
    <?php endif; 
}  ?>






