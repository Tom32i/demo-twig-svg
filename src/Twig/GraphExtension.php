<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class GraphExtension extends AbstractExtension
{
    const MONTH_FORMATS = [
        'long-with-year' => 'MMMM Y',
        'short' => 'LLL',
    ];

    const MASS_UNITS = ['g', 'kg', 't'];

    public function getFunctions()
    {
        return [
            new TwigFunction('rad', [$this, 'getAngleInRadian']),
            new TwigFunction('pi', 'pi'),
            new TwigFunction('angle_to_point', [$this, 'getPositionFromAngle']),
        ];
    }

    public function getFilters()
    {
        return [
            new TwigFilter('percentage', [$this, 'formatPercentage']),
            new TwigFilter('mass', [$this, 'formatMass']),
            new TwigFilter('month', [$this, 'formatMonth']),
        ];
    }

    public function getAngleInRadian(float $ratio)
    {
        return $ratio * 2 * pi();
    }

    public function getPositionFromAngle(float $angle, float $radius = 1): array
    {
        return [
            'x' => cos($angle) * $radius,
            'y' => sin($angle) * $radius,
        ];
    }

    public function formatMonth($value, string $format = 'long-with-year')
    {
        $date = $value instanceof \DateTime ? $value : new \DateTime($value);

        $formatter = \IntlDateFormatter::create(
            null,
            \IntlDateFormatter::NONE,
            \IntlDateFormatter::NONE,
            \IntlTimeZone::createTimeZone($date->getTimezone()->getName()),
            \IntlDateFormatter::GREGORIAN,
            self::MONTH_FORMATS[$format]
        );

        return $formatter->format($date->getTimestamp());
    }

    public function formatPercentage(float $value, int $decimals = 0, string $decPoint = '.', string $thousandsSep = ' ')
    {
        return rtrim(rtrim(number_format($value * 100, $decimals, $decPoint, $thousandsSep), '0'), '.') . '%';
    }

    public function formatMass(int $value)
    {
        $number = $value;
        $unit = 0;

        while ($number >= 1000 && $unit < \count(self::MASS_UNITS)) {
            $number = $number / 1000;
            ++$unit;
        }

        return implode(' ', [
            rtrim(rtrim(number_format($number, 2, '.', ' '), '0'), '.'),
            self::MASS_UNITS[$unit],
        ]);
    }
}
