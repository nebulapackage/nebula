<?php

namespace Larsklopstra\Nebula\Fields;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use Larsklopstra\Nebula\Contracts\NebulaField;
use Larsklopstra\Nebula\Fields\Concerns\HasHelperText;

class DateField extends NebulaField
{
    use HasHelperText;

    protected string $format = 'Y-m-d';

    /**
     * Applies the date format in the front-end.
     *
     * @param mixed $date
     * @return string
     * @throws InvalidFormatException
     */
    public function applyFormat($date)
    {
        return Carbon::parse($date)->format($this->format);
    }

    /**
     * Applies the date format in the front-end.
     *
     * @param string $format
     * @return $this
     */
    public function format(string $format): self
    {
        $this->format = $format;

        return $this;
    }
}
