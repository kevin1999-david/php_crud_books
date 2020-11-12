<?php
require_once '../model/BookModel.php'; #

session_start();

$bookModel = new BookModel();
$option = $_REQUEST['option'];
#Clear all message
unset($_SESSION['msg']);
unset($_SESSION['color_msg']);

switch ($option) {
    case 'allBooks':
        $books = $bookModel->getAllBooks();
        $_SESSION['listBooks'] = serialize($books);
        header('Location: ../index.php');
        break;
    case 'updateBook':
        $code = $_REQUEST['code'];
        $title = $_REQUEST['title'];
        $author = $_REQUEST['author'];
        $year = $_REQUEST['year'];
        $pages = $_REQUEST['pages'];

        $bookModel->updateBook($code, $title, $author, $year, $pages);

        $books = $bookModel->getAllBooks();

        $_SESSION['listBooks'] = serialize($books);

        $_SESSION['msg'] = "Book Updated!";
        $_SESSION['color_msg'] = "info";

        header('Location: ../index.php');
        break;

    case 'loadUpdateBook':
        $code = $_REQUEST['code'];
        $book = $bookModel->getBook($code);

        $_SESSION['book'] = ($book);



        header('Location: ../view/update.php');
        break;
    case 'createBook':

        $code = $_REQUEST['code'];
        $title = $_REQUEST['title'];
        $author = $_REQUEST['author'];
        $year = $_REQUEST['year'];
        $pages = $_REQUEST['pages'];

        try {
            $bookModel->createBook($code, $title, $author, $year, $pages);
        } catch (Exception $e) {
            $_SESSION['msg'] = $e->getMessage();
            $_SESSION['color_msg'] = "danger";
            header('Location: ../index.php');
            break;
        }
        $books = $bookModel->getAllBooks();
        $_SESSION['listBooks'] = serialize($books);
        $_SESSION['msg'] = "New Book Registered!";
        $_SESSION['color_msg'] = "success";

        header('Location: ../index.php');
        break;
    case 'removeBook':
        $code = $_REQUEST['code'];
        $bookModel->removeBook($code);
        $books = $bookModel->getAllBooks();
        $_SESSION['listBooks'] = serialize($books);
        $_SESSION['msg'] = "Book Deleted :(!";
        $_SESSION['color_msg'] = "danger";
        header('Location: ../index.php');
        break;
    default:
        $books = $bookModel->getAllBooks();
        $_SESSION['listBooks'] = serialize($books);
        header('Location: ../index.php');
        break;
}
