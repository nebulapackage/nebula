<?php

namespace Larsklopstra\Nebula\Contracts;

use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

abstract class NebulaField
{
    protected string $name = '';
    protected string $label = '';
    protected string $value = '';
    protected bool $required = false;
    protected array $rules = [];

    public function make(string $name): self
    {
        $this->name = $name;

        $this->label = Str::of($name)
            ->replace('_', ' ')
            ->lower()
            ->ucfirst();

        return $this;
    }

    public function label($label): self
    {
        $this->label = $label;

        return $this;
    }

    public function value($value): self
    {
        $this->value = $value;

        return $this;
    }

    public function required(bool $required = true): self
    {
        $this->required = $required;

        return $this;
    }

    public function rules($rules): self
    {
        if (! is_array($rules)) {
            $this->rules = explode('|', $rules);

            return $this;
        }

        $this->rules = $rules;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getRequired(): bool
    {
        return $this->required;
    }

    public function getRules(): array
    {
        return $this->rules;
    }

    /**
     * Gets the details blade view for this component.
     *
     * @return string
     */
    public function getDetailsComponent()
    {
        return "nebula::fields.details.{$this->getComponentName()}";
    }

    /**
     * Returns the component name for this component.
     *
     * @return Stringable
     */
    public function getComponentName()
    {
        return Str::of(class_basename($this))
            ->replaceLast('Field', '')
            ->kebab()
            ->lower();
    }

    /**
     * Returns the form blade view for this component.
     *
     * @return string
     */
    public function getFormComponent()
    {
        return "nebula::fields.forms.{$this->getComponentName()}";
    }
}
