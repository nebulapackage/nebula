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

    public function __construct(string $label, string $name = null)
    {
        $this->label($label);
        $this->name($name ??= $label);
    }

    public static function make(string $label, string $name = null): self
    {
        return new static($label, $name);
    }

    public function name(string $name): self
    {
        $this->name = Str::of($name)
            ->replace(' ', '_')
            ->lower();

        return $this;
    }

    public function label($label): self
    {
        $this->label = Str::of($label)
            ->ucfirst();

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
        if (!is_array($rules)) {
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

    public function shouldRender()
    {
        return $this instanceof Listable;
    }

    public function getDetailsComponent()
    {
        return "nebula::fields.details.{$this->getComponentName()}";
    }

    public function getComponentName()
    {
        return Str::of(class_basename($this))
            ->replaceLast('Field', '')
            ->kebab()
            ->lower();
    }

    public function getFormComponent()
    {
        return "nebula::fields.forms.{$this->getComponentName()}";
    }

    public function getTableComponent()
    {
        return "nebula::fields.tables.{$this->getComponentName()}";
    }
}
