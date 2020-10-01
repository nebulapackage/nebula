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

    /**
     * Construct the field.
     *
     * @param string $label
     * @param string $name
     */
    public function __construct(string $label, string $name = null)
    {
        $this->label($label);
        $this->name($name ??= $label);
    }

    /**
     * Make a field.
     *
     * @param string $label
     * @param string $name
     * @return $this
     */
    public static function make(string $label, string $name = null): self
    {
        return new static($label, $name);
    }

    /**
     * Set the name.
     *
     * @param string $name
     * @return $this
     */
    public function name(string $name): self
    {
        $this->name = Str::of($name)
            ->replace('_', ' ')
            ->lower();

        return $this;
    }

    /**
     * Set the label.
     *
     * @param mixed $label
     * @return $this
     */
    public function label($label): self
    {
        $this->label = Str::of($label)
            ->ucfirst();

        return $this;
    }

    /**
     * Set the value.
     *
     * @param mixed $value
     * @return $this
     */
    public function value($value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Set the required property.
     *
     * @param bool $required
     * @return $this
     */
    public function required(bool $required = true): self
    {
        $this->required = $required;

        return $this;
    }

    /**
     * Set the rules.
     *
     * @param mixed $rules
     * @return $this
     */
    public function rules($rules): self
    {
        if (! is_array($rules)) {
            $this->rules = explode('|', $rules);

            return $this;
        }

        $this->rules = $rules;

        return $this;
    }

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the label.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Get the value.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Get the required property.
     *
     * @return bool
     */
    public function getRequired(): bool
    {
        return $this->required;
    }

    /**
     * Get the rules.
     *
     * @return array
     */
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

    /**
     * Returns the table blade view for this component.
     *
     * @return string
     */
    public function getTableComponent()
    {
        return "nebula::fields.tables.{$this->getComponentName()}";
    }
}
