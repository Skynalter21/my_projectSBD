<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
    <label for="nome" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.faculdade.columns.nome') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nome" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}" id="nome" name="nome" placeholder="{{ trans('admin.faculdade.columns.nome') }}">
        <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sigla'), 'has-success': fields.sigla && fields.sigla.valid }">
    <label for="sigla" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.faculdade.columns.sigla') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sigla" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sigla'), 'form-control-success': fields.sigla && fields.sigla.valid}" id="sigla" name="sigla" placeholder="{{ trans('admin.faculdade.columns.sigla') }}">
        <div v-if="errors.has('sigla')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sigla') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('bloco'), 'has-success': fields.bloco && fields.bloco.valid }">
    <label for="bloco" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.faculdade.columns.bloco') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.bloco" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('bloco'), 'form-control-success': fields.bloco && fields.bloco.valid}" id="bloco" name="bloco" placeholder="{{ trans('admin.faculdade.columns.bloco') }}">
        <div v-if="errors.has('bloco')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bloco') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('numAlunos'), 'has-success': fields.numAlunos && fields.numAlunos.valid }">
    <label for="numAlunos" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.faculdade.columns.numAlunos') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.numAlunos" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('numAlunos'), 'form-control-success': fields.numAlunos && fields.numAlunos.valid}" id="numAlunos" name="numAlunos" placeholder="{{ trans('admin.faculdade.columns.numAlunos') }}">
        <div v-if="errors.has('numAlunos')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('numAlunos') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('numProfessor'), 'has-success': fields.numProfessor && fields.numProfessor.valid }">
    <label for="numProfessor" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.faculdade.columns.numProfessor') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.numProfessor" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('numProfessor'), 'form-control-success': fields.numProfessor && fields.numProfessor.valid}" id="numProfessor" name="numProfessor" placeholder="{{ trans('admin.faculdade.columns.numProfessor') }}">
        <div v-if="errors.has('numProfessor')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('numProfessor') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('orcamento'), 'has-success': fields.orcamento && fields.orcamento.valid }">
    <label for="orcamento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.faculdade.columns.orcamento') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.orcamento" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('orcamento'), 'form-control-success': fields.orcamento && fields.orcamento.valid}" id="orcamento" name="orcamento" placeholder="{{ trans('admin.faculdade.columns.orcamento') }}">
        <div v-if="errors.has('orcamento')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('orcamento') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('universidade'), 'has-success': fields.universidade && fields.universidade.valid }">
    <label for="universidade" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.diretor.columns.universidade') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <!-- <input type="text" v-model="form.universidade" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('universidade'), 'form-control-success': fields.universidade && fields.universidade.valid}" id="universidade" name="universidade" placeholder="{{ trans('admin.diretor.columns.universidade') }}"> -->
        <multiselect
            v-model="form.universidade"
            :options="universidades"
            :multiple="false"
            track-by="id"
            label="nome"
            tag-placeholder="{{ __('Selecionar universidade') }}"
            placeholder="{{ __('universidade') }}">>
        </multiselect>
        <div v-if="errors.has('universidade')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('universidade') }}</div>
    </div>
</div>





