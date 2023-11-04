# Faker Russian
Faker russian specific values INN, OGRN, KPP etc.

## Installation
```bash
composer require --dev davarch/faker-russian
```

## Usage
```php
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
 
class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'bik' => $this->faker->bik(),
            'cadastral_number' => $this->faker->cadastralNumber(),
            'correspondent_account' => $this->faker->correspondentAccount(),
            'inn' => $this->faker->inn(),
            'kpp' => $this->faker->kpp(),
            'ogrn' => $this->faker->ogrn(),
            'okato' => $this->faker->okato(),
            'okpo' => $this->faker->okpo(),
            'rs' => $this->faker->rs(),
            'snils' => $this->faker->snils(),
        ];
    }
}
```

## Code style
```bash 
composer pint
```

## Analyse
```bash 
composer stan
```

## Tests
```bash
composer test
```

```bash
composer types
```

```bash
composer coverage
```
