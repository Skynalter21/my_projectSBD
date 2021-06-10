<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Diretor\BulkDestroyDiretor;
use App\Http\Requests\Admin\Diretor\DestroyDiretor;
use App\Http\Requests\Admin\Diretor\IndexDiretor;
use App\Http\Requests\Admin\Diretor\StoreDiretor;
use App\Http\Requests\Admin\Diretor\UpdateDiretor;
use App\Models\Diretor;
use App\Models\Professor;
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

class DiretorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDiretor $request
     * @return array|Factory|View
     */
    public function index(IndexDiretor $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Diretor::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['FK_idDiretor'],

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

        return view('admin.diretor.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.diretor.create');

        return view('admin.diretor.create', [
            'professores' => Professor::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDiretor $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreDiretor $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        $sanitized['FK_idDiretor'] = $sanitized['professor']['id'];

        // Store the Diretor
        $diretor = Diretor::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/diretors'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/diretors');
    }

    /**
     * Display the specified resource.
     *
     * @param Diretor $diretor
     * @throws AuthorizationException
     * @return void
     */
    public function show(Diretor $diretor)
    {
        $this->authorize('admin.diretor.show', $diretor);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Diretor $diretor
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Diretor $diretor)
    {
        $this->authorize('admin.diretor.edit', $diretor);


        return view('admin.diretor.edit', [
            'diretor' => $diretor,
            'professores' => Professor::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDiretor $request
     * @param Diretor $diretor
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateDiretor $request, Diretor $diretor)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        $sanitized['FK_idDiretor'] = $sanitized['professor']['id'];

        // Update changed values Diretor
        $diretor->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/diretors'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/diretors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyDiretor $request
     * @param Diretor $diretor
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyDiretor $request, Diretor $diretor)
    {
        $diretor->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyDiretor $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyDiretor $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Diretor::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
