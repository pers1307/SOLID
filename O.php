<?php

/**
 * SOLID
 * O - Принцип открытости / закрытости.
 * Open/closed pronciple
 *
 * Классы открыты для расширения и закрыты для изменения
 *
 * Для изменения поведения класса не нужно менять код самого класса
 */

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
    public function __construct(Logger $logger)
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

class Logger
{
    /**
     * @param string $message
     */
    public function log($message)
    {
        // ...
        $this->saveToFile($message);
    }
}

$logger = new Logger();

$product = new Product($logger);

$product->setPrice(10);