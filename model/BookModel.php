<?php
include_once 'Database.php';
include_once 'Book.php';

class BookModel
{
    public function createBook($code, $title, $author, $year, $pages)
    {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO book (code,title,author,year,pages) VALUES(?,?,?,?,?)";

        $query = $pdo->prepare($sql);

        try {
            $query->execute(array($code, $title, $author, $year, $pages));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }


    public function removeBook($code)
    {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM book WHERE code=?";
        $query = $pdo->prepare($sql);
        $query->execute(array($code));
        Database::disconnect();
    }




    public function getAllBooks()
    {
        $pdo = Database::connect();
        $sql = "SELECT * FROM book";
        $query = $pdo->query($sql);
        $listBooks = array();
        foreach ($query as $book) {
            $newBook = new Book($book['code'], $book['title'], $book['author'], $book['year'], $book['pages']);
            array_push($listBooks, $newBook);
        }
        Database::disconnect();
        return $listBooks;
    }


    public function getBook($code)
    {
        //Obtenemos la informacion del producto especifico:
        $pdo = Database::connect();
        //Utilizamos parametros para la consulta:
        $sql = "SELECT * FROM book WHERE code=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros para la consulta:
        $consulta->execute(array($code));
        //Extraemos el registro especifico:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        //Transformamos el registro obtenido a objeto:
        $book = new Book($res['code'], $res['title'], $res['author'], $res['year'], $res['pages']);
        Database::disconnect();
        return $book;
    }


    public function updateBook($code, $title, $author, $year, $pages)
    {
        //echo "$code - $title - $author - $year - $pages <br>";

        $pdo = Database::connect();
        $sql = "update book set title=?,year=?,author=?,pages=? where code=?";
        $consulta = $pdo->prepare($sql);
        $consulta;
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($title, $year, $author, $pages, $code));
        Database::disconnect();
    }
}
