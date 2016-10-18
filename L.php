<?php

/**
 * SOLID
 * L - Принцип подстановки Барбары Лисков
 * Listkov Subdtitution Principle, LSP
 *
 * Логика классов предков не должна противоречить,
 * логике базового класса.
 */

class Bird
{
    /**
     * @return int
     */
    public function fly()
    {
        return 10;
    }
}

/**
 * Class Duck
 * Не изменяет поведение, но дополняет его.
 * Не нарушает принцып L
 */
class Duck extends Bird
{
    /**
     * @return int
     */
    public function fly()
    {
        return 10;
    }

    /**
     * @return int
     */
    public function swim()
    {
        return 2;
    }
}

/**
 * Class Penguin
 * Нарушает принцип L
 * Возникает не типичное поведение
 */
class Penguin extends Bird
{
    /**
     * @return int
     */
    public function fly()
    {
        return "I can't fly!";
    }

    /**
     * @return int
     */
    public function swim()
    {
        return 4;
    }
}

/**
 * Class BirdRun
 */
class BirdRun
{
    /**
     * @var Bird
     */
    private $bird;

    /**
     * BirdRun constructor.
     * @param Bird $bird
     */
    public function __construct(Bird $bird)
    {
        $this->bird = $bird;
    }

    public function run()
    {
        $flySpeed = $this->bird->fly();
    }
}

$bird = new Bird();
//$bird = new Duck();
//$bird = new Penguin();

$birdRun = new BirdRun($bird);
$birdRun->run();