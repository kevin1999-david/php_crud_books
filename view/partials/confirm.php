<div class="modal fade" id="fm-modal-grid<?= $book->getCode(); ?>" tabindex="-1" role="dialog" aria-labelledby="fm-modal-grid" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Attention!</h5>
                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <p>Are you sure to delete the book?</p>
                </div>
            </div>

            <div class="modal-footer">
                <a href="controller/controller.php?option=removeBook&code=<?= $book->getCode(); ?> " class="btn btn-success">Accept!</a>
                <button class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>