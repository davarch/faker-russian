<?php

declare(strict_types=1);

use Davarch\FakerRussian\Faker;

it('can get random bik', function (): void {
    $faker = new Faker();

    expect($faker->bik())->toHaveLength(10)
        ->and($faker->bik(okatoRegionNumber: '78'))->toMatch('/^\d{2}78\d{6}$/')
        ->and($faker->bik(sequenceNumber: 1))->toEqual($faker->bik(sequenceNumber: 1))
        ->and($faker->bik(sequenceNumber: 1))->not()->toEqual($faker->bik(sequenceNumber: 2));
});

it('can get random inn', function (): void {
    $faker = new Faker();

    expect($faker->inn(kind: 'legal'))->toHaveLength(10)
        ->and($faker->inn(kind: 'individual'))->toHaveLength(12)
        ->and($faker->inn(regionNumber: '78', kind: 'legal'))->toMatch('/^78\d{8}$/')
        ->and($faker->inn(regionNumber: '64', kind: 'individual'))->toMatch('/^64\d{10}$/')
        ->and($faker->inn(sequenceNumber: 1))->toEqual($faker->inn(sequenceNumber: 1))
        ->and($faker->inn(sequenceNumber: 1))->not()->toEqual($faker->inn(sequenceNumber: 2));
});

it('can get random okpo', function (): void {
    $faker = new Faker();

    expect($faker->okpo())->toMatch('/^\d{8}|\d{10}$/')
        ->and($faker->okpo(1))->toEqual($faker->okpo(1))
        ->and($faker->okpo(1))->not()->toEqual($faker->okpo(2));
});

it('can get random kpp', function (): void {
    $faker = new Faker();

    expect($faker->kpp())->toHaveLength(9)
        ->and($faker->kpp(regionNumber: '78'))->toMatch('/^78\d{2}01001/')
        ->and($faker->kpp(sequenceNumber: 1))->toEqual($faker->kpp(sequenceNumber: 1))
        ->and($faker->kpp(sequenceNumber: 1))->not()->toEqual($faker->kpp(sequenceNumber: 2));
});

it('can get random rs', function (): void {
    $faker = new Faker();

    expect($faker->rs())->toHaveLength(20)
        ->and($faker->rs(okv: '810'))->toMatch('/^\d{5}810\d{12}$/')
        ->and($faker->rs(sequenceNumber: 1))->toEqual($faker->rs(sequenceNumber: 1))
        ->and($faker->rs(sequenceNumber: 1))->not()->toEqual($faker->rs(sequenceNumber: 2));
});

it('can get random correspondent account', function (): void {
    $faker = new Faker();

    expect($faker->correspondentAccount())->toHaveLength(20)
        ->and($faker->correspondentAccount(bik: '044525957'))->toMatch('/^301\d{14}957$/')
        ->and($faker->correspondentAccount(sequenceNumber: 1))->toEqual($faker->correspondentAccount(sequenceNumber: 1))
        ->and($faker->correspondentAccount(sequenceNumber: 1))->not()->toEqual($faker->correspondentAccount(sequenceNumber: 2));
});

it('can get random snils', function (): void {
    $faker = new Faker();

    expect($faker->snils())->toMatch('/^\d{3}\d{3}\d{3}\d{2}$/')
        ->and($faker->snils(sequenceNumber: 1))->toEqual($faker->snils(sequenceNumber: 1))
        ->and($faker->snils(sequenceNumber: 1))->not()->toEqual($faker->snils(sequenceNumber: 2));
});

it('can get random okato', function (): void {
    $faker = new Faker();

    expect($faker->okato(length: 3))->toMatch('/^\d{3}$/')
        ->and($faker->okato(okatoRegionNumber: '25', length: 3))->toMatch('/^25\d$/')
        ->and($faker->okato(sequenceNumber: 1))->toEqual($faker->okato(sequenceNumber: 1))
        ->and($faker->okato(sequenceNumber: 1))->not()->toEqual($faker->okato(sequenceNumber: 2));
});

it('can get random cadastral number', function (): void {
    $faker = new Faker();

    expect($faker->cadastralNumber())->toMatch('/^\d{2}:\d{2}:\d{6,7}:\d{3,5}$/')
        ->and($faker->cadastralNumber(district: 1))->toMatch('/^01:\d{2}:\d{6,7}:\d{3,5}$/')
        ->and($faker->cadastralNumber(district: 1, area: 1))->toMatch('/^01:01:\d{6,7}:\d{3,5}$/')
        ->and($faker->cadastralNumber(district: 1, area: 1, quarter: 120))->toMatch('/^01:01:120:\d{3,5}$/')
        ->and($faker->cadastralNumber(sequenceNumber: 1))->toEqual($faker->cadastralNumber(sequenceNumber: 1))
        ->and($faker->cadastralNumber(sequenceNumber: 1))->not()->toEqual($faker->cadastralNumber(sequenceNumber: 2));
});

it('can get random ogrn', function (): void {
    $faker = new Faker();

    expect($faker->ogrn(kind: 'legal'))->toMatch('/^\d{13}$/')
        ->and($faker->ogrn(kind: 'individual'))->toMatch('/^\d{15}$/')
        ->and($faker->ogrn(regionNumber: '78', kind: 'legal'))->toMatch('/^\d{3}78\d{8}$/')
        ->and($faker->ogrn(regionNumber: '64', kind: 'individual'))->toMatch('/^\d{3}64\d{10}$/')
        ->and($faker->ogrn(sequenceNumber: 1))->toEqual($faker->ogrn(sequenceNumber: 1))
        ->and($faker->ogrn(sequenceNumber: 1))->not()->toEqual($faker->ogrn(sequenceNumber: 2));
});
