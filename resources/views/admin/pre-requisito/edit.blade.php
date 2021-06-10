@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.pre-requisito.actions.edit', ['name' => $preRequisito->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <pre-requisito-form
                :action="'{{ $preRequisito->resource_url }}'"
                :data="{{ $preRequisito->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.pre-requisito.actions.edit', ['name' => $preRequisito->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.pre-requisito.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </pre-requisito-form>

        </div>
    
</div>

@endsection