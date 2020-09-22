<?php

namespace Larsklopstra\Nebula\Http\Controllers;

use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Larsklopstra\Nebula\Contracts\NebulaResource;
use Larsklopstra\Nebula\Traits\Toasts;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class ResourceController
{
    use Toasts;

    /**
     * Populates the resource its fields with a given model.
     *
     * @param mixed $fields
     * @param mixed $model
     * @return void
     */
    private function populateFieldsWith($fields, $model): void
    {
        foreach ($fields as $field) {
            $field->value($model[$field->getName()]);
        }
    }

    /**
     * Returns the index view with metrics, search filters and resource entries.
     *
     * @param Request $request
     * @param NebulaResource $resource
     * @return View
     * @throws Exception
     * @throws BindingResolutionException
     */
    public function index(Request $request, NebulaResource $resource): View
    {
        $filter = $request->query('filter');
        $search = $request->query('search');

        $builder = $resource->model()::query()->withoutGlobalScopes();

        if (! empty($filter)) {
            $builder = $resource->resolveFilter($filter)->build($builder, $request);
        }

        if (! empty($search)) {
            foreach ($resource->searchable() as $column) {
                $builder->orWhere($column, 'like', "%$search%");
            }
        }

        return view('nebula::resources.index', [
            'model' => $builder->paginate(),
            'columns' => $resource->columns(),
            'metrics' => $resource->metrics(),
            'resource' => $resource,
            'activeFilter' => $filter,
            'activeSearch' => $search,
        ]);
    }

    /**
     * Shows a resource entry.
     *
     * @param NebulaResource $resource
     * @param mixed $model
     * @return View
     * @throws BindingResolutionException
     */
    public function show(NebulaResource $resource, $model): View
    {
        $fields = $resource->fields();

        $this->populateFieldsWith($fields, $model);

        return view('nebula::resources.show', [
            'fields' => $fields,
            'resource' => $resource,
            'model' => $model,
        ]);
    }

    /**
     * Shows the edit form of a resource entry.
     *
     * @param NebulaResource $resource
     * @param mixed $model
     * @return View
     * @throws BindingResolutionException
     */
    public function edit(NebulaResource $resource, $model): View
    {
        $fields = $resource->editFields();

        $this->populateFieldsWith($fields, $model);

        return view('nebula::resources.edit', [
            'fields' => $fields,
            'resource' => $resource,
            'model' => $model,
        ]);
    }

    /**
     * Updates a resource entry.
     *
     * @param Request $request
     * @param NebulaResource $resource
     * @param mixed $model
     * @return RedirectResponse
     * @throws BindingResolutionException
     */
    public function update(Request $request, NebulaResource $resource, $model): RedirectResponse
    {
        $validated = $request->validate($resource->rules(
            $resource->editFields()
        ));

        $resource->update($model, $validated);

        $this->toast(__(':Resource updated', [
            'resource' => $resource->singularName(),
        ]));

        return redirect()->back();
    }

    /**
     * Shows the create form for a resource.
     *
     * @param NebulaResource $resource
     * @return View
     * @throws BindingResolutionException
     */
    public function create(NebulaResource $resource): View
    {
        return view('nebula::resources.create', [
            'fields' => $resource->createFields(),
            'resource' => $resource,
        ]);
    }

    /**
     * Stores a new resource entry.
     *
     * @param Request $request
     * @param NebulaResource $resource
     * @return RedirectResponse
     * @throws Exception
     * @throws BindingResolutionException
     */
    public function store(Request $request, NebulaResource $resource): RedirectResponse
    {
        $validated = $request->validate($resource->rules(
            $resource->createFields()
        ));

        $resource->store($resource->model(), $validated);

        $this->toast(__(':Resource created', [
            'resource' => $resource->singularName(),
        ]));

        return redirect()->back();
    }

    /**
     * Deletes a resource entry.
     *
     * @param NebulaResource $resource
     * @param mixed $model
     * @return RedirectResponse
     * @throws BindingResolutionException
     * @throws RouteNotFoundException
     */
    public function destroy(NebulaResource $resource, $model): RedirectResponse
    {
        $resource->delete($model);

        $this->toast(__(':Resource deleted', [
            'resource' => $resource->singularName(),
        ]));

        return redirect()->route('nebula.resources.index', $resource->name());
    }
}
