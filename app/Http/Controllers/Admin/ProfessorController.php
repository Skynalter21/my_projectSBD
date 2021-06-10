<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Professor\BulkDestroyProfessor;
use App\Http\Requests\Admin\Professor\DestroyProfessor;
use App\Http\Requests\Admin\Professor\IndexProfessor;
use App\Http\Requests\Admin\Professor\StoreProfessor;
use App\Http\Requests\Admin\Professor\UpdateProfessor;
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

class ProfessorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexProfessor $request
     * @return array|Factory|View
     */
    public function index(IndexProfessor $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Professor::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nome', 'nascimento'],

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

        return view('admin.professor.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.professor.create');

        return view('admin.professor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProfessor $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreProfessor $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Professor
        $professor = Professor::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/professors'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/professors');
    }

    /**
     * Display the specified resource.
     *
     * @param Professor $professor
     * @throws AuthorizationException
     * @return void
     */
    public function show(Professor $professor)
    {
        $this->authorize('admin.professor.show', $professor);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Professor $professor
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Professor $professor)
    {
        $this->authorize('admin.professor.edit', $professor);


        return view('admin.professor.edit', [
            'professor' => $professor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProfessor $request
     * @param Professor $professor
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateProfessor $request, Professor $professor)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Professor
        $professor->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/professors'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/professors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyProfessor $request
     * @param Professor $professor
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyProfessor $request, Professor $professor)
    {
        $professor->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyProfessor $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyProfessor $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Professor::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
