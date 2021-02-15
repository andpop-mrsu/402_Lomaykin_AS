<?php

use PHPUnit\Framework\TestCase;
use App\Book;

class BookTest extends TestCase
{
    public function testSetName()
    {
        $book = new Book();
        $book->setTittle("PHP 7 в подлиннике");

        self::assertEquals("PHP 7 в подлиннике", $book->getTittle());
    }

    public function testSetAuthors()
    {
        $book = new Book();
        $book->setAuthors(array("Дмитрий Котеров", "Игорь Симдянов"));

        self::assertEquals(array("Дмитрий Котеров", "Игорь Симдянов"), $book->getAuthors());
    }

    public function testSetPublisher()
    {
        $book = new Book();
        $book->setPublisher("БХВ-Петербург");

        self::assertEquals("БХВ-Петербург", $book->getPublisher());
    }

    public function testSetYear()
    {
        $book = new Book();
        $book->setYear(2016);

        self::assertEquals(2016, $book->getYear());
    }
}
