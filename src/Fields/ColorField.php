<?php

namespace Larsklopstra\Nebula\Fields;

use Larsklopstra\Nebula\Contracts\NebulaField;

class ColorField extends NebulaField
{
    protected array $colors = [
        '#e02424',
        '#d03801',
        '#9f580a',
        '#057a55',
        '#047481',
        '#1c64f2',
        '#5850ec',
        '#7e3af2',
        '#d61f69',
    ];

    /**
     * Sets the colors.
     *
     * @param array $colors
     * @return ColorField
     */
    public function colors(array $colors): self
    {
        $this->colors = $colors;

        return $this;
    }

    /**
     * Returns the array of colors.
     *
     * @return array
     */
    public function getColors(): array
    {
        return $this->colors;
    }
}
