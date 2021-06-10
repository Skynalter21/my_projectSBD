<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PreRequisito\BulkDestroyPreRequisito;
use App\Http\Requests\Admin\PreRequisito\DestroyPreRequisito;
use App\Http\Requests\Admin\PreRequisito\IndexPreRequisito;
use App\Http\Requests\Admin\PreRequisito\StorePreRequisito;
use App\Http\Requests\Admin\PreRequisito\UpdatePreRequisito;
use App\Models\PreRequisito;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PreRequisitosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPreRequisito $request
     * @return array|Factory|View
     */
    public function index(IndexPreRequisito $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(PreRequisito::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['FK_idDisciplina', 'pre_requisito'],

            // set columns to searchIn
            ['']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.pre-requisito.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.pre-requisito.create');

        return view('admin.pre-requisito.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePreRequisito $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePreRequisito $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the PreRequisito
        $preRequisito = PreRequisito::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/pre-requisitos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/pre-requisitos');
    }

    /**
     * Display the specified resource.
     *
     * @param PreRequisito $preRequisito
     * @throws AuthorizationException
     * @return void
     */
    public function show(PreRequisito $preRequisito)
    {
        $this->authorize('admin.pre-requisito.show', $preRequisito);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PreRequisito $preRequisito
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(PreRequisito $preRequisito)
    {
        $this->authorize('admin.pre-requisito.edit', $preRequisito);


        return view('admin.pre-requisito.edit', [
            'preRequisito' => $preRequisito,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePreRequisito $request
     * @param PreRequisito $preRequisito
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePreRequisito $request, PreRequisito $preRequisito)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values PreRequisito
        $preRequisito->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/pre-requisitos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/pre-requisitos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPreRequisito $request
     * @param PreRequisito $preRequisito
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPreRequisito $request, PreRequisito $preRequisito)
    {
        $preRequisito->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPreRequisito $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPreRequisito $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    PreRequisito::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
