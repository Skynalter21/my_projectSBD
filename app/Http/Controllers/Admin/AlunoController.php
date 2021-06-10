<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Aluno\BulkDestroyAluno;
use App\Http\Requests\Admin\Aluno\DestroyAluno;
use App\Http\Requests\Admin\Aluno\IndexAluno;
use App\Http\Requests\Admin\Aluno\StoreAluno;
use App\Http\Requests\Admin\Aluno\UpdateAluno;
use App\Models\Aluno;
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

class AlunoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAluno $request
     * @return array|Factory|View
     */
    public function index(IndexAluno $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Aluno::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nome', 'nascimento', 'telefone', 'faltas', 'cra', 'FK_idTurma', 'FK_idOrientador'],

            // set columns to searchIn
            ['id', 'nome', 'telefone']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.aluno.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.aluno.create');

        return view('admin.aluno.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAluno $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAluno $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Aluno
        $aluno = Aluno::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/alunos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/alunos');
    }

    /**
     * Display the specified resource.
     *
     * @param Aluno $aluno
     * @throws AuthorizationException
     * @return void
     */
    public function show(Aluno $aluno)
    {
        $this->authorize('admin.aluno.show', $aluno);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Aluno $aluno
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Aluno $aluno)
    {
        $this->authorize('admin.aluno.edit', $aluno);


        return view('admin.aluno.edit', [
            'aluno' => $aluno,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAluno $request
     * @param Aluno $aluno
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAluno $request, Aluno $aluno)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Aluno
        $aluno->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/alunos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/alunos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAluno $request
     * @param Aluno $aluno
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAluno $request, Aluno $aluno)
    {
        $aluno->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAluno $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAluno $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Aluno::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
