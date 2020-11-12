<?php include_once('./view/partials/header.php') ?>

<?php

include './model/Book.php';
session_start();
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">

            <?php
            if (isset($_SESSION['msg'])) {
                include_once('./view/partials/message.php');
                unset($_SESSION['msg']);
                unset($_SESSION['color_msg']);
            }
            ?>
            <div class="card">
                <div class="card-header">
                    BOOK DATA
                </div>

                <div class="card-body">
                    <form action="controller/controller.php">
                        <input type="hidden" value="createBook" name="option">
                        <div class="form-group">
                            <input class="form-control" type="text" name="code" required placeholder="Insert the code">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="title" required placeholder="Insert the title">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="author" required placeholder="Insert the author">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="year" required placeholder="Insert the year">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="pages" required placeholder="Insert the pages">
                        </div>
                        <button class="btn btn-success btn-block"> <i class="fas fa-arrow-alt-circle-right mr-1"></i>Create Book</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">

            <table class="table table-sm table-responsive-xx table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Code</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Author</th>
                        <th class="text-center">Year</th>
                        <th class="text-center">Pages</th>
                        <th class="text-center">Options</th>
                    </tr>
                </thead>

                <?php if (isset($_SESSION['listBooks'])) {
                    $books = unserialize($_SESSION['listBooks']);
                    foreach ($books as $book) {
                        include('./view/partials/confirm.php');
                ?>

                        <tr>
                            <td class="text-center"> <?= $book->getCode(); ?> </td>
                            <td class="text-center"> <?= $book->getTitle(); ?> </td>
                            <td class="text-center"> <?= $book->getAuthor(); ?> </td>
                            <td class="text-center"> <?= $book->getYear(); ?> </td>
                            <td class="text-center"> <?= $book->getPages(); ?> </td>
                            <td class="text-center">

                                <a data-toggle="tooltip" data-placement="top" title="Edit this book!" class="btn btn-primary" href="controller/controller.php?option=loadUpdateBook&code=<?= $book->getCode() ?>"> <i class="fas fa-pen-alt"></i></a>

                                <!-- <div class="d-inline-block" my-data-toggle="tool" data-placement="top" title="Remove this book!">

                                </div> -->
                                <button class="btn btn-danger" my-data-toggle="tool" data-placement="top" title="Remove this book!" data-toggle="modal" data-target="#fm-modal-grid<?= $book->getCode(); ?>"> <i class="far fa-trash-alt"></i> </button>
                            </td>
                        </tr>


                <?php    }
                }  ?>
                <!-- <tr>
                        <td>Cesar</td>
                        <td>37</td>
                        <td>Colombia</td>
                    </tr> -->

            </table>
        </div>
    </div>
</div>


<?php include_once('./view/partials/footer.php') ?>