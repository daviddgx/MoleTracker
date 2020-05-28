
<?php
$error = true;
if($error){
    $error = '<script type="text/javascript">
    $("#ModalMarchmo").modal("show");
    </script>';
}

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>

    <body>

        <div class="container">
            <h2>Revision del Marchamo</h2>
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#ModalMarchmo">Validar Selectivo</button>

            <!-- Modal -->
            <div class="modal fade" id="ModalMarchmo" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Selectivo</h4>
                        </div>
                        <div class="modal-body">
                            <p>Se ha valdado el Marchamo, su selectivo tiene el siguente resultado</p>
                            <br>
                            <p>Se guardo el resiltado del analisis.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        
        <div> <?php echo $error ; ?></div>
    </body>

    </html>