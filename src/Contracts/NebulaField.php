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
     * Construct the field
     * 
     * @param string $name 
     */
    public function __construct(string $name)
    {
        $this->name($name);
    }

    /**
     * Make a field
     * 
     * @param string $name 
     * @return NebulaField 
     */
    public static function make(string $name): self
    {
        return new static($name);
    }

    /**
     * Set the name
     * 
     * @param string $name 
     * @return NebulaField 
     */
    public function name(string $name): self
    {
        $this->name = $name;

        $this->label = Str::of($name)
            ->replace('_', ' ')
            ->lower()
            ->ucfirst();

        return $this;
    }

    /**
     * Set the label
     * 
     * @param mixed $label 
     * @return NebulaField 
     */
    public function label($label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Set the value
     * 
     * @param mixed $value 
     * @return NebulaField 
     */
    public function value($value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Set the required property
     * 
     * @param bool $required 
     * @return NebulaField 
     */
    public function required(bool $required = true): self
    {
        $this->required = $required;

        return $this;
    }

    /**
     * Set the rules
     * 
     * @param mixed $rules 
     * @return NebulaField 
     */
    public function rules($rules): self
    {
        if (!is_array($rules)) {
            $this->rules = explode('|', $rules);

            return $this;
        }

        $this->rules = $rules;

        return $this;
    }

    /**
     * Get the name
     * 
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Get the value
     * 
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Get the required property
     * 
     * @return bool 
     */
    public function getRequired(): bool
    {
        return $this->required;
    }

    /**
     * Get the rules
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
