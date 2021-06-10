@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.diretor.actions.edit', ['name' => $diretor->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <diretor-form
                :action="'{{ $diretor->resource_url }}'"
                :data="{{ $diretor->toJson() }}"
                :professores="{{ $professores->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.diretor.actions.edit', ['name' => $diretor->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.diretor.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </diretor-form>

        </div>
    
</div>

@endsection