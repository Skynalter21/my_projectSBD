<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Universidade\BulkDestroyUniversidade;
use App\Http\Requests\Admin\Universidade\DestroyUniversidade;
use App\Http\Requests\Admin\Universidade\IndexUniversidade;
use App\Http\Requests\Admin\Universidade\StoreUniversidade;
use App\Http\Requests\Admin\Universidade\UpdateUniversidade;
use App\Models\Universidade;
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

class UniversidadeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexUniversidade $request
     * @return array|Factory|View
     */
    public function index(IndexUniversidade $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Universidade::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nome'],

            // set columns to searchIn
            ['id', 'nome']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.universidade.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.universidade.create');

        return view('admin.universidade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUniversidade $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreUniversidade $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Universidade
        $universidade = Universidade::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/universidades'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/universidades');
    }

    /**
     * Display the specified resource.
     *
     * @param Universidade $universidade
     * @throws AuthorizationException
     * @return void
     */
    public function show(Universidade $universidade)
    {
        $this->authorize('admin.universidade.show', $universidade);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Universidade $universidade
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Universidade $universidade)
    {
        $this->authorize('admin.universidade.edit', $universidade);


        return view('admin.universidade.edit', [
            'universidade' => $universidade,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUniversidade $request
     * @param Universidade $universidade
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateUniversidade $request, Universidade $universidade)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Universidade
        $universidade->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/universidades'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/universidades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyUniversidade $request
     * @param Universidade $universidade
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyUniversidade $request, Universidade $universidade)
    {
        $universidade->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyUniversidade $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyUniversidade $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Universidade::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
