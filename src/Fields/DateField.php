<?php

namespace Larsklopstra\Nebula\Fields;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use Larsklopstra\Nebula\Contracts\NebulaField;

class DateField extends NebulaField
{
    protected string $format = 'Y-m-d';

    public function getValue(): string
    {
        return Carbon::parse($this->value)->format($this->format);
    }

    /**
     * Returns a complaint date format for the HTML datepicker.
     *
     * @return string
     * @throws InvalidFormatException
     */
    public function getHTMLDatePickerFormatValue(): string
    {
        return Carbon::parse($this->value)->format('Y-m-d');
    }

    /**
     * Applies the date format in the front-end.
     *
     * @param string $format
     * @return DateField
     */
    public function format(string $format): self
    {
        $this->format = $format;

        return $this;
    }
}
