<?php

/**
 * SOLID
 * D - Принцип инверсии зависимостей.
 * Dependency Inversion Principle, DIP
 *
 * Зависимости внутри системы строятся на основе абстракций
 * Модули верхних уровней не должны зависеть от модулей нижних уровней
 * Оба типа модулей должны зависеть от абстракций
 * Абстракции не должны зависеть от деталей
 * Детали должны зависеть от абстракций
 *
 * Зависимости должны строится относительно абстракций
 * а не деталей (классов)
 */

//class Wife
//{
//    public function getFood()
//    {
//        return 'food';
//    }
//}

/**
 * Class lowRankingMale
 * Пример неправильного кода
 * Слишком большая зависимость от класса Wife
 */
class lowRankingMale
{
    public function eat()
    {
        $wife = new Wife();

        $food = $wife->getFood();
    }
}

class averageRankingMale
{
    /**
     * @var Wife
     */
    private $wife;

    /**
     * averageRankingMale constructor.
     * @param Wife $wife
     */
    public function __construct(Wife $wife)
    {
        $this->wife = $wife;
    }

    public function eat()
    {
        $food = $this->wife->getFood();
    }
}

interface IFoodProvider
{
    public function getFood();
}

class Wife implements IFoodProvider
{
    public function getFood()
    {
        return 'food';
    }
}

class Restaurant implements IFoodProvider
{
    public function getFood()
    {
        return 'food';
    }
}

/**
 * Class highRankingMale
 * Зависимость не от класса, а от абстракции
 */
class highRankingMale
{
    /**
     * @var IFoodProvider
     */
    private $foodProvider;

    /**
     * highRankingMale constructor.
     * @param IFoodProvider $foodProvider
     */
    public function __construct(IFoodProvider $foodProvider)
    {
        $this->foodProvider = $foodProvider;
    }

    public function eat()
    {
        $food = $this->foodProvider->getFood();
    }
}