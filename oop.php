<?php

class Book {
    // Private properties
    private $title;
    private $availableCopies;

    // Constructor to initialize properties
    public function __construct($title, $availableCopies) {
        $this->title = $title;
        $this->availableCopies = $availableCopies;
    }

    // Method to get the title of the book
    public function getTitle() {
        return $this->title;
    }

    // Method to get the number of available copies
    public function getAvailableCopies() {
        return $this->availableCopies;
    }

    // Method to borrow a book
    public function borrowBook() {
        if ($this->availableCopies > 0) {
            $this->availableCopies--;
            return true;
        }
        return false;
    }

    // Method to return a book
    public function returnBook() {
        $this->availableCopies++;
    }
}

class Member {
    // Private properties
    private $name;
    private $borrowedBooks = [];

    // Constructor to initialize properties
    public function __construct($name) {
        $this->name = $name;
    }

    // Method to get the name of the member
    public function getName() {
        return $this->name;
    }

    // Method to borrow a book
    public function borrowBook(Book $book) {
        if ($book->borrowBook()) {
            $this->borrowedBooks[] = $book;
            echo "{$this->name} borrowed '{$book->getTitle()}'.\n";
        } else {
            echo "{$this->name} could not borrow '{$book->getTitle()}' because no copies are available.\n";
        }
    }

    // Method to return a book
    public function returnBook(Book $book) {
        foreach ($this->borrowedBooks as $key => $borrowedBook) {
            if ($borrowedBook === $book) {
                unset($this->borrowedBooks[$key]);
                $book->returnBook();
                echo "{$this->name} returned '{$book->getTitle()}'.\n";
                return;
            }
        }
        echo "{$this->name} does not have '{$book->getTitle()}' to return.\n";
    }
}

// Create 2 books
$book1 = new Book("The Great Gatsby", 5);
$book2 = new Book("To Kill a Mockingbird", 3);

// Create 2 members
$member1 = new Member("John Doe");
$member2 = new Member("Jane Smith");

// Members borrow books
$member1->borrowBook($book1);
$member2->borrowBook($book2);

// Print available copies
echo "\nAvailable Copies:\n";
echo "{$book1->getTitle()}: {$book1->getAvailableCopies()} copies left.\n";
echo "{$book2->getTitle()}: {$book2->getAvailableCopies()} copies left.\n";

?>
