<?php

declare(strict_types=1);

namespace Davarch\FakerRussian\Randomizer;

use Davarch\FakerRussian\Support\Sequence;

final readonly class CadastralNumber
{
    public static function make(int $sequenceNumber = null, int $district = null, int $area = null, int $quarter = null): string
    {
        $sequence = Sequence::findSequence($sequenceNumber);

        $district = self::formatNumber($district ?? self::cadastralDistrict($sequence));
        $area = self::formatNumber($area ?? self::cadastralArea($sequence));
        $quarter = $quarter ?? self::cadastralQuarter($sequence);

        $propertyNumber = self::propertyNumber($sequence);

        return "$district:$area:$quarter:$propertyNumber";
    }

    private static function formatNumber(int $param): string
    {
        $param = (string) $param;
        if (strlen($param) === 1 && $param !== '0') {
            return "0{$param}";
        }

        return $param;
    }

    private static function cadastralDistrict(Sequence $sequence): int
    {
        return $sequence->minMax(1, 91);
    }

    private static function cadastralArea(Sequence $sequence): int
    {
        return $sequence->minMax(1, 99);
    }

    private static function cadastralQuarter(Sequence $sequence): int
    {
        if ($sequence->rand(2) === 0) {
            return $sequence->minMax(100000, 999999);
        }

        return $sequence->minMax(1000000, 9999999);
    }

    private static function propertyNumber(Sequence $sequence): int
    {
        return $sequence->minMax(1, 99999);
    }
}
