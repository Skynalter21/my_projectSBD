<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Disciplina\BulkDestroyDisciplina;
use App\Http\Requests\Admin\Disciplina\DestroyDisciplina;
use App\Http\Requests\Admin\Disciplina\IndexDisciplina;
use App\Http\Requests\Admin\Disciplina\StoreDisciplina;
use App\Http\Requests\Admin\Disciplina\UpdateDisciplina;
use App\Models\Disciplina;
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

class DisciplinasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDisciplina $request
     * @return array|Factory|View
     */
    public function index(IndexDisciplina $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Disciplina::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nome', 'sigla', 'numCreditos', 'FK_idTurma', 'FK_idProfessor'],

            // set columns to searchIn
            ['id', 'nome', 'sigla']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.disciplina.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.disciplina.create');

        return view('admin.disciplina.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDisciplina $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreDisciplina $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Disciplina
        $disciplina = Disciplina::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/disciplinas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/disciplinas');
    }

    /**
     * Display the specified resource.
     *
     * @param Disciplina $disciplina
     * @throws AuthorizationException
     * @return void
     */
    public function show(Disciplina $disciplina)
    {
        $this->authorize('admin.disciplina.show', $disciplina);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Disciplina $disciplina
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Disciplina $disciplina)
    {
        $this->authorize('admin.disciplina.edit', $disciplina);


        return view('admin.disciplina.edit', [
            'disciplina' => $disciplina,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDisciplina $request
     * @param Disciplina $disciplina
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateDisciplina $request, Disciplina $disciplina)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Disciplina
        $disciplina->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/disciplinas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/disciplinas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyDisciplina $request
     * @param Disciplina $disciplina
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyDisciplina $request, Disciplina $disciplina)
    {
        $disciplina->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyDisciplina $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyDisciplina $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Disciplina::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
