<?php

/**
 * SOLID
 * I - Принцип разделения интерфейса
 * Interface Segregation Principle, ISP
 *
 * Клиенты не должны зависеть от методов, которые они не используют
 *
 * Много специализированных интерфейсов, лучше, чем один универсальный.
 */

interface ICarTransformer
{
    public function toCar();
}

interface IPlaneTransformer
{
    public function toPlane();
}

interface IShipTransformer
{
    public function toShip();
}

class SuperTransformer implements ICarTransformer, IPlaneTransformer, IShipTransformer
{
    public function toCar()
    {

    }

    public function toPlane()
    {

    }

    public function toShip()
    {

    }
}

class CarTransformer implements ICarTransformer
{
    public function toCar()
    {

    }
}

