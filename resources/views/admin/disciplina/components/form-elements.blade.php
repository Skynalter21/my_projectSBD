<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
    <label for="nome" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.disciplina.columns.nome') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nome" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}" id="nome" name="nome" placeholder="{{ trans('admin.disciplina.columns.nome') }}">
        <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sigla'), 'has-success': fields.sigla && fields.sigla.valid }">
    <label for="sigla" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.disciplina.columns.sigla') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sigla" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sigla'), 'form-control-success': fields.sigla && fields.sigla.valid}" id="sigla" name="sigla" placeholder="{{ trans('admin.disciplina.columns.sigla') }}">
        <div v-if="errors.has('sigla')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sigla') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('local'), 'has-success': fields.local && fields.local.valid }">
    <label for="local" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.turma.columns.local') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        {{-- <input type="text" v-model="form.local" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('local'), 'form-control-success': fields.local && fields.local.valid}" id="local" name="local" placeholder="{{ trans('admin.turma.columns.local') }}"> --}}
        <multiselect
            v-model="form.local"
            :options="locais"
            :multiple="false"
            track-by="id"
            label="nome_bloco"
            tag-placeholder="{{ __('Selecionar Locais') }}"
            placeholder="{{ __('Locais') }}">>
        </multiselect>
        <div v-if="errors.has('local')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('local') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('numCreditos'), 'has-success': fields.numCreditos && fields.numCreditos.valid }">
    <label for="numCreditos" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.disciplina.columns.numCreditos') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.numCreditos" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('numCreditos'), 'form-control-success': fields.numCreditos && fields.numCreditos.valid}" id="numCreditos" name="numCreditos" placeholder="{{ trans('admin.disciplina.columns.numCreditos') }}">
        <div v-if="errors.has('numCreditos')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('numCreditos') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('FK_idTurma'), 'has-success': fields.FK_idTurma && fields.FK_idTurma.valid }">
    <label for="FK_idTurma" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.disciplina.columns.FK_idTurma') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        {{-- <input type="text" v-model="form.FK_idTurma" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('FK_idTurma'), 'form-control-success': fields.FK_idTurma && fields.FK_idTurma.valid}" id="FK_idTurma" name="FK_idTurma" placeholder="{{ trans('admin.disciplina.columns.FK_idTurma') }}"> --}}
        <multiselect
            v-model="form.turma"
            :options="turmas"
            :multiple="false"
            track-by="id"
            label="nome"
            tag-placeholder="{{ __('Selecionar turma') }}"
            placeholder="{{ __('Turma') }}">>
        </multiselect>
        <div v-if="errors.has('FK_idTurma')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('FK_idTurma') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('FK_idProfessor'), 'has-success': fields.FK_idProfessor && fields.FK_idProfessor.valid }">
    <label for="FK_idProfessor" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.disciplina.columns.FK_idProfessor') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        {{-- <input type="text" v-model="form.FK_idProfessor" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('FK_idProfessor'), 'form-control-success': fields.FK_idProfessor && fields.FK_idProfessor.valid}" id="FK_idProfessor" name="FK_idProfessor" placeholder="{{ trans('admin.disciplina.columns.FK_idProfessor') }}"> --}}
        <multiselect
            v-model="form.professor"
            :options="professores"
            :multiple="false"
            track-by="id"
            label="nome"
            tag-placeholder="{{ __('Selecionar Professor') }}"
            placeholder="{{ __('Professor') }}">>
        </multiselect>
        <div v-if="errors.has('FK_idProfessor')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('FK_idProfessor') }}</div>
    </div>
</div>


