<?php
//SecondTrial
class Book {
  private $title;
  private $author;
  private $pages;
  private $cover;
  private $price;

  public function __construct ($title = null, $author = null, $cover = null, $pages = null, $price = null) {

    $this->title = $title;
    $this->author = $author;
    $this->pages = $pages;
    $this->cover = $cover;
    $this->price = $price;
  }

  public function getInfo() {
    echo "<h1>{$this->title}</h1><h2>Автор - {$this->author}</h2><p>Страниц в книге - {$this->pages}</p>";
  }

  public function getPrice() {
    echo "Книга стоит {$this->price} р. <br>";
  }

  public function getTypeOfCover() {
    echo "Обложка издания - {$this->cover} <br>";
  }

}

$book1 = new Book('PHP7', 'Котеров, Симдянов', 'Твердая', 1088,  1050);
$book1->getInfo();
$book1->getPrice();
$book1->getTypeOfCover();

$book2 = new Book('PHP. Объекты, шаблоны и методики программирования', 'Мэтт Зандстра', 'Твердая', 576,  1378);
$book2->getInfo();
$book2->getPrice();
$book2->getTypeOfCover();

$book3 = new Book('Повести Белкина', 'Пушкин', 'Мягкая', 300, 470);

$book3->getInfo();
$book3->getPrice();
$book3->getTypeOfCover();

//Добавим жанр к классу нехудожественной литературы
class NonFictionBook extends Book {
  private $genre;

  public function __construct ($title = null, $author = null, $cover = null, $pages = null, $price = null, $genre = null) {
    parent::__construct ($title, $author, $cover, $pages, $price);
    $this->genre = $genre;
  }

  public function getGenre() {
    echo "Жанр - {$this->genre} <br>";
  }

}

$book4 = new NonFictionBook ('Вася Пупкин. Обо мне', 'Василий Пупкин', 'Твердая', 500, 350, 'Автобиография');

$book4->getInfo();
$book4->getGenre();

//Предмет изучения для учебной литературы

class StudyBook extends Book {
  private $subject;

  public function __construct ($title = null, $author = null, $cover = null, $pages = null, $price = null, $subject = null) {
    parent::__construct ($title, $author, $cover, $pages, $price);
    $this->subject = $subject;
  }

  public function getSubject() {
    echo "Предмет - {$this->subject} <br>";
  }

}

$book5 = new StudyBook ('Английский за 5 минут', 'Василий Пупкин', 'Твердая', 700, 1300, 'Иностранные языки');

$book5->getInfo();
$book5->getPrice();
$book5->getSubject();

/////////////////////////////////////////////

/*class A {
  public function foo() {
      static $x = 0;
      echo ++$x;
  }
}
$a1 = new A();
$a2 = new A();

$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();
*/
// На кадом шаге мы получаем число, увеличенное на 1. Это происходит потому, что переменная $x принадлежит не созданным объектам
// а классу, в котором она создана (слово static); Соответственно при каждом вызове функции из любого объекта, принадлежащего классу будет увеличение на 1.

/*class A {
  public function foo() {
      static $x = 0;
      echo ++$x;
  }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a2 = new A();
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo();
$a2->foo();
*/
//Здесь мы создаем дочерний класс. Соответственно, для каждого дочернего класса будет действовать тоже правило, что и для родительского, только уже для каждого класса по отдельности. Даже специально создала еще один объект класса A, чтобы было видно,что у нового объекта static $x продолжает дальше инкрементироваться. Аналогично, если создать другие объекты для класса B, поведение будет таким же, но уже внутри класса B.

class A {
  public function foo() {
      static $x = 0;
      echo ++$x;
  }
}
class B extends A {
}

//Из документации - "В случае отсутствия аргументов в конструкторе класса, круглые скобки после названия класса можно опустить."
//У нас самого конструктора-то явного в классе нет, а аргументов уж тем более. Поэтому такая запись без скобок, эквивалентна
//записи выше. 
$a1 = new A; //Здесь нет круглых скобок 
$b1 = new B;
$a2 = new A;
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo(); 
$a2->foo();
