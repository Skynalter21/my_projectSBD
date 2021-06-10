<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Faculdade\BulkDestroyFaculdade;
use App\Http\Requests\Admin\Faculdade\DestroyFaculdade;
use App\Http\Requests\Admin\Faculdade\IndexFaculdade;
use App\Http\Requests\Admin\Faculdade\StoreFaculdade;
use App\Http\Requests\Admin\Faculdade\UpdateFaculdade;
use App\Models\Faculdade;
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

class FaculdadeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexFaculdade $request
     * @return array|Factory|View
     */
    public function index(IndexFaculdade $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Faculdade::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nome', 'sigla', 'bloco', 'numAlunos', 'numProfessor', 'orcamento'],

            // set columns to searchIn
            ['id', 'nome', 'sigla', 'bloco']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.faculdade.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.faculdade.create');

        return view('admin.faculdade.create', [
            'universidades' => Universidade::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFaculdade $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreFaculdade $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        $sanitized['FK_idUniversidade'] = $sanitized['universidade']['id'];

        // Store the Faculdade
        $faculdade = Faculdade::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/faculdades'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/faculdades');
    }

    /**
     * Display the specified resource.
     *
     * @param Faculdade $faculdade
     * @throws AuthorizationException
     * @return void
     */
    public function show(Faculdade $faculdade)
    {
        $this->authorize('admin.faculdade.show', $faculdade);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Faculdade $faculdade
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Faculdade $faculdade)
    {
        $this->authorize('admin.faculdade.edit', $faculdade);


        return view('admin.faculdade.edit', [
            'faculdade' => $faculdade,
            'universidades' => Universidade::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFaculdade $request
     * @param Faculdade $faculdade
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateFaculdade $request, Faculdade $faculdade)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        $sanitized['FK_idUniversidade'] = $sanitized['universidade']['id'];

        // Update changed values Faculdade
        $faculdade->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/faculdades'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/faculdades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyFaculdade $request
     * @param Faculdade $faculdade
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyFaculdade $request, Faculdade $faculdade)
    {
        $faculdade->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyFaculdade $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyFaculdade $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Faculdade::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
