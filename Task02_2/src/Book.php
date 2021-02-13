<?php


namespace App;


class Book
{
    private static int $lastId = 1;

    private int $id;
    private string $tittle;
    private array $authors;
    private string $publisher;
    private int $year;

    public function __construct()
    {
        $this->id = self::$lastId++;
    }

    public function __toString(): string
    {
        $authors = $this->authors;
        $authorsOutput = "";

        for ($i = 0, $iMax = count($authors); $i < $iMax; $i++) {
            $authorsOutput .= "Автор" . ($i + 1) . ": " . $authorsOutput[$i] . "\n";
        }

        return ("Id: {$this -> id}" . "\n" .
            "Название: " . "\n" .
            $authorsOutput .
            "Издательство: " . "\n" .
            "Год: ");
    }

    public function setTittle(string $tittle)
    {
        $this->tittle = $tittle;

        return $this;
    }

    public function getTittle(): string
    {
        return $this->tittle;
    }

    public function setAuthors($authors)
    {
        $this->authors = $authors;

        return $this;
    }

    public function getAuthors()
    {
        return $this->authors;
    }

    public function setPublisher(string $publisher)
    {
        $this->publisher = $publisher;

        return $this;
    }

    public function getPublisher()
    {
        return $this->publisher;
    }

    public function setYear(int $year)
    {
        $this->year = $year;

        return $this;
    }

    public function getYear()
    {
        return $this->year;
    }
}
