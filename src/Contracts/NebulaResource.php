<?php

namespace Larsklopstra\Nebula\Contracts;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

abstract class NebulaResource
{
    protected $with = [];

    protected $searchable = [];

    public function searchable()
    {
        return $this->searchable;
    }

    /**
     * Specifies the metrics which should be displayed.
     *
     * @return array
     */
    public function metrics(): array
    {
        return [];
    }

    /**
     * Specifies the icon which should be used in the menu.
     *
     * @return string
     */
    public function icon()
    {
        return 'tag';
    }

    /**
     * Returns the model, if not overriden the class will be resolved based on the resource its classname.
     *
     * @return string
     * @throws Exception
     */
    public function model()
    {
        $className = Str::replaceLast('Resource', '', class_basename($this));

        $namespaces = [
            'App',
            'App\Models',
        ];

        foreach ($namespaces as $namespace) {
            if (class_exists("$namespace\\$className")) {
                return "$namespace\\$className";
            }
        }

        throw new Exception("Auto resolved $className model doesn't exist, please add your own via the `model()` method.");
    }

    /**
     * Returns the basename of the resource.
     *
     * @return Stringable
     */
    public function name()
    {
        return Str::of(class_basename($this))
            ->replaceLast('Resource', '')
            ->kebab()
            ->lower()
            ->plural();
    }

    /**
     * Returns the singular name of the resource.
     *
     * @return Stringable
     */
    public function singularName()
    {
        return Str::of($this->name())
            ->replace('-', ' ')
            ->singular();
    }

    /**
     * Returns the plural name of the resource.
     *
     * @return string
     */
    public function pluralName()
    {
        return Str::plural($this->singularName());
    }

    /**
     * Returns the resource its fields.
     *
     * @return array
     */
    abstract public function fields(): array;

    /**
     * Returns the fields used for the edit form.
     *
     * @return array
     */
    public function indexFields(): array
    {
        return $this->fields();
    }

    /**
     * Returns the fields used for the edit form.
     *
     * @return array
     */
    public function editFields(): array
    {
        return $this->fields();
    }

    /**
     * Returns the fields for the create form.
     *
     * @return array
     */
    public function createFields(): array
    {
        return $this->fields();
    }

    public function filters(): array
    {
        return [];
    }

    /**
     * Returns the rules for each field.
     *
     * @param array $fields
     * @return array
     */
    public function rules(array $fields): array
    {
        $rules = [];

        foreach ($fields as $field) {
            array_push($rules, [
                $field->getName() => $field->getRules(),
            ]);
        }

        return array_merge(...$rules);
    }

    /**
     * Resolves the index filters.
     *
     * @param string $name
     * @return mixed
     * @throws Exception
     */
    public function resolveFilter(string $name)
    {
        foreach ($this->filters() as $filter) {
            if ($filter->name() === $name) {
                return $filter;
            }
        }

        throw new Exception("Filter $name not found.");
    }

    /**
     * The query for the index view
     * 
     * @return mixed 
     * @throws Exception 
     */
    public function indexQuery()
    {
        return $this->model()::query()
            ->withoutGlobalScopes()
            ->with($this->with);
    }

    /**
     * Specifies the update query.
     *
     * @param mixed $model
     * @param mixed $data
     * @return void
     */
    public function updateQuery($model, $data)
    {
        $model->update($data);
    }

    /**
     * Specifies the store query.
     *
     * @param mixed $model
     * @param mixed $data
     * @return void
     */
    public function storeQuery($model, $data)
    {
        $model::create($data);
    }

    /**
     * Specifies the destroy query.
     *
     * @param mixed $model
     * @return void
     */
    public function destroyQuery($model)
    {
        $model->delete();
    }
}
