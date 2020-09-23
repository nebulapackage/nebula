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

        if (!empty($filter)) {
            $builder = $resource->resolveFilter($filter)->build($builder, $request);
        }

        if (!empty($search)) {
            foreach ($resource->searchable() as $column) {
                $builder->orWhere($column, 'like', "%$search%");
            }
        }

        return view('nebula::resources.index', [
            'items' => $builder->paginate(),
            'resource' => $resource,
            'activeFilter' => $filter,
            'activeSearch' => $search,
        ]);
    }

    /**
     * Shows a resource entry.
     *
     * @param NebulaResource $resource
     * @param mixed $item
     * @return View
     * @throws BindingResolutionException
     */
    public function show(NebulaResource $resource, $item): View
    {
        return view('nebula::resources.show', [
            'resource' => $resource,
            'item' => $item,
        ]);
    }

    /**
     * Shows the edit form of a resource entry.
     *
     * @param NebulaResource $resource
     * @param mixed $item
     * @return View
     * @throws BindingResolutionException
     */
    public function edit(NebulaResource $resource, $item): View
    {
        return view('nebula::resources.edit', [
            'resource' => $resource,
            'item' => $item,
        ]);
    }

    /**
     * Updates a resource entry.
     *
     * @param Request $request
     * @param NebulaResource $resource
     * @param mixed $item
     * @return RedirectResponse
     * @throws BindingResolutionException
     */
    public function update(Request $request, NebulaResource $resource, $item): RedirectResponse
    {
        $validated = $request->validate($resource->rules(
            $resource->editFields()
        ));

        $resource->update($item, $validated);

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
     * @param mixed $item
     * @return RedirectResponse
     * @throws BindingResolutionException
     * @throws RouteNotFoundException
     */
    public function destroy(NebulaResource $resource, $item): RedirectResponse
    {
        $resource->delete($item);

        $this->toast(__(':Resource deleted', [
            'resource' => $resource->singularName(),
        ]));

        return redirect()->route('nebula.resources.index', $resource->name());
    }
}
