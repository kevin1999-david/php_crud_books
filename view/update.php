<?php include_once('./partials/header.php') ?>


<?php

include '../model/Book.php';
session_start();
$book = $_SESSION['book'];
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-header">
                    UPDATE BOOK
                </div>
                <div class="card-body">
                    <form action="../controller/controller.php">
                        <input type="hidden" value="updateBook" name="option">
                        <div class="form-group">
                            <input class="form-control" type="text" name="code" required placeholder="Insert the code" value="<?= $book->getCode() ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="title" required placeholder="Insert the title" value="<?= $book->getTitle() ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="author" required placeholder="Insert the author" value="<?= $book->getAuthor() ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="year" required placeholder="Insert the year" value="<?= $book->getYear() ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="pages" required placeholder="Insert the pages" value="<?= $book->getPages() ?>">
                        </div>
                        <button class="btn btn-success btn-block"> <i class="fas fa-arrow-alt-circle-right mr-1"></i>Update Book</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('./partials/footer.php') ?>