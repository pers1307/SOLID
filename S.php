<?php

/**
 * SOLID
 *
 * S - принцип единственной обязанности (ответственности)
 * Single responsibility principle
 *
 * Любой объект имеет только одну обязанность и эта обязанность,
 * реализована полностью в рамках этого класса
 */

interface Ilogger
{
    /**
     * @param string $message
     */
    public function log($message);
}

class FileLogger implements Ilogger
{
    /**
     * @param string $message
     */
    public function log($message)
    {
        // ...
        $this->saveToFile($message);
    }

    private function saveToFile($message)
    {
        // ...
    }
}

class DBLogger implements Ilogger
{
    /**
     * @param string $message
     */
    public function log($message)
    {
        // ...
        $this->saveToDB($message);
    }

    private function saveToDB($message)
    {
        // ...
    }
}

class Product
{
    /**
     * @var Logger
     */
    private $logger;

    /**
     * Product constructor.
     * @param Logger $logger
     */
    public function __construct(Ilogger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        try {

        } catch (Exception $e) {

            $this->logger->log($e->getMessage());
        }
    }
}

$logger = new DBLogger();

$product = new Product($logger);

$product->setPrice(10);

/**
 * Вывод: Надо программировать на уровне интерфейса.
 * И если надо изменить или добавить функциональность,
 * то оптимально написать (скопировать и подправить)
 * новый класс на основе этого интерфейса
 */