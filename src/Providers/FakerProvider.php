<?php

declare(strict_types=1);

namespace Davarch\FakerRussian\Providers;

use Davarch\FakerRussian\Randomizer\Bik;
use Davarch\FakerRussian\Randomizer\CadastralNumber;
use Davarch\FakerRussian\Randomizer\CorrespondentAccount;
use Davarch\FakerRussian\Randomizer\Inn;
use Davarch\FakerRussian\Randomizer\Kpp;
use Davarch\FakerRussian\Randomizer\Ogrn;
use Davarch\FakerRussian\Randomizer\Okato;
use Davarch\FakerRussian\Randomizer\Okpo;
use Davarch\FakerRussian\Randomizer\Rs;
use Davarch\FakerRussian\Randomizer\Snils;
use Exception;
use Faker\Provider\Base;

class FakerProvider extends Base
{
    public static function bik(int $sequenceNumber = null, string $okatoRegionNumber = null): string
    {
        return Bik::make($sequenceNumber, $okatoRegionNumber);
    }

    public static function inn(int $sequenceNumber = null, string $regionNumber = null, string $kind = null): string
    {
        return Inn::make($sequenceNumber, $regionNumber, $kind);
    }

    public static function okpo(int $sequenceNumber = null): string
    {
        return Okpo::make($sequenceNumber);
    }

    public static function kpp(int $sequenceNumber = null, string $regionNumber = null): string
    {
        return Kpp::make($sequenceNumber, $regionNumber);
    }

    public static function rs(int $sequenceNumber = null, string $okv = null): string
    {
        return Rs::make($sequenceNumber, $okv);
    }

    public static function correspondentAccount(int $sequenceNumber = null, string $bik = null): string
    {
        return CorrespondentAccount::make($sequenceNumber, $bik);
    }

    public static function snils(int $sequenceNumber = null): string
    {
        return Snils::make($sequenceNumber);
    }

    /**
     * @throws Exception
     */
    public static function okato(int $sequenceNumber = null, string $okatoRegionNumber = null, int $length = null): string
    {
        return Okato::make($sequenceNumber, $okatoRegionNumber, $length);
    }

    public static function cadastralNumber(int $sequenceNumber = null, int $district = null, int $area = null, int $quarter = null): string
    {
        return CadastralNumber::make($sequenceNumber, $district, $area, $quarter);
    }

    /**
     * @throws Exception
     */
    public static function ogrn(int $sequenceNumber = null, string $regionNumber = null, string $kind = null): string
    {
        return Ogrn::make($sequenceNumber, $regionNumber, $kind);
    }
}
