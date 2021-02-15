<?php

use PHPUnit\Framework\TestCase;
use App\Book;
use App\BooksList;

class BooksListTest extends TestCase
{
    public function testAddAndCount()
    {
        $book = new Book();
        $booksList = new BooksList();
        $booksList->add($book);
        self::assertSame(1, $booksList->count());
    }

    public function testGet()
    {
        $book = new Book();
        $booksList = new BooksList();
        $book->setTittle("PHP 7 в подлиннике")->setAuthors(array("Дмитрий Котеров", "Игорь Симдянов"))
            ->setPublisher("БХВ-Петербург")->setYear(2016);
        $booksList->add($book);
        self::assertInstanceOf(Book::class, $booksList -> get(1));
    }

    public function testStore()
    {
        $book = new Book();
        $booksList = new BooksList();
        $book->setTittle("PHP 7 в подлиннике")->setAuthors(array("Дмитрий Котеров", "Игорь Симдянов"))
            ->setPublisher("БХВ-Петербург")->setYear(2016);
        $booksList->add($book);
        self::assertNull($booksList->store("output"));
    }

    public function testLoad()
    {
        $booksList = new BooksList();
        $booksList->load("output");
        self::assertSame(1, $booksList->count());
        self::assertInstanceOf(Book::class, $booksList->get(1));
    }
}
