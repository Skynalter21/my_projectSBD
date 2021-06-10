<div class="form-group row align-items-center" :class="{'has-danger': errors.has('professor'), 'has-success': fields.professor && fields.professor.valid }">
    <label for="professor" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.diretor.columns.professor') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <!-- <input type="text" v-model="form.professor" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('professor'), 'form-control-success': fields.professor && fields.professor.valid}" id="professor" name="professor" placeholder="{{ trans('admin.diretor.columns.professor') }}"> -->
        <multiselect
            v-model="form.professor"
            :options="professores"
            :multiple="false"
            track-by="id"
            label="nome"
            tag-placeholder="{{ __('Selecionar Professor') }}"
            placeholder="{{ __('Professor') }}">>
        </multiselect>
        <div v-if="errors.has('professor')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('professor') }}</div>
    </div>
</div>


