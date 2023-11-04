<?php

declare(strict_types=1);

namespace Davarch\FakerRussian\Dataset;

use Davarch\FakerRussian\Support\Sequence;
use InvalidArgumentException;

final readonly class RegionNumber
{
    const REGION_NUMBER = 'regionNumbers';

    const OKATO_REGION_NUMBER = 'okatoRegionNumbers';

    public static function findRegionNumber(?string $number, Sequence $sequence, string $regionNumberType): string
    {
        $regionNumbers = match ($regionNumberType) {
            self::REGION_NUMBER => self::regionNumbers(),
            self::OKATO_REGION_NUMBER => self::okatoRegionNumbers(),
            default => throw new InvalidArgumentException('Invalid region number type')
        };

        if ($number && (int) $number > 0) {
            if (! in_array($number, self::regionNumbers())) {
                throw new InvalidArgumentException('There is no region with that number!');
            }

            return $number;
        }

        return $regionNumbers[$sequence->rand(count($regionNumbers) - 1)];
    }

    /**
     * @return array<int, string>
     */
    public static function regionNumbers(): array
    {
        return [
            '01',
            '02',
            '03',
            '04',
            '05',
            '06',
            '07',
            '08',
            '09',
            '10',
            '11',
            '12',
            '13',
            '14',
            '15',
            '16',
            '17',
            '18',
            '19',
            '20',
            '21',
            '22',
            '23',
            '24',
            '25',
            '26',
            '27',
            '28',
            '29',
            '30',
            '31',
            '32',
            '33',
            '34',
            '35',
            '36',
            '37',
            '38',
            '39',
            '40',
            '41',
            '42',
            '43',
            '44',
            '45',
            '46',
            '47',
            '48',
            '49',
            '50',
            '51',
            '52',
            '53',
            '54',
            '55',
            '56',
            '57',
            '58',
            '59',
            '60',
            '61',
            '62',
            '63',
            '64',
            '65',
            '66',
            '67',
            '68',
            '69',
            '70',
            '71',
            '72',
            '73',
            '74',
            '75',
            '76',
            '77',
            '78',
            '79',
            '83',
            '86',
            '87',
            '89',
            '91',
            '92',
        ];
    }

    /**
     * @return array<int, string>
     */
    public static function okatoRegionNumbers(): array
    {
        return [
            '01',
            '03',
            '04',
            '05',
            '07',
            '08',
            '11',
            '12',
            '14',
            '15',
            '17',
            '19',
            '20',
            '22',
            '24',
            '25',
            '26',
            '27',
            '28',
            '29',
            '32',
            '33',
            '34',
            '35',
            '36',
            '37',
            '38',
            '40',
            '41',
            '42',
            '43',
            '44',
            '45',
            '46',
            '47',
            '48',
            '49',
            '50',
            '51',
            '52',
            '53',
            '54',
            '55',
            '56',
            '57',
            '58',
            '59',
            '60',
            '61',
            '62',
            '63',
            '64',
            '65',
            '66',
            '67',
            '68',
            '69',
            '72',
            '73',
            '74',
            '75',
            '76',
            '77',
            '78',
            '79',
            '80',
            '81',
            '82',
            '83',
            '84',
            '85',
            '86',
            '87',
            '88',
            '89',
            '90',
            '91',
            '92',
            '93',
            '94',
            '95',
            '96',
            '97',
            '98',
            '99',
        ];
    }
}
