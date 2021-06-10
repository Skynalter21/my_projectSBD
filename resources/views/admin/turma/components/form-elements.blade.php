<div class="form-group row align-items-center" :class="{'has-danger': errors.has('semestre'), 'has-success': fields.semestre && fields.semestre.valid }">
    <label for="semestre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.turma.columns.semestre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.semestre" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('semestre'), 'form-control-success': fields.semestre && fields.semestre.valid}" id="semestre" name="semestre" placeholder="{{ trans('admin.turma.columns.semestre') }}">
        <div v-if="errors.has('semestre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('semestre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('FK_local'), 'has-success': fields.FK_local && fields.FK_local.valid }">
    <label for="FK_local" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.turma.columns.FK_local') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.FK_local" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('FK_local'), 'form-control-success': fields.FK_local && fields.FK_local.valid}" id="FK_local" name="FK_local" placeholder="{{ trans('admin.turma.columns.FK_local') }}">
        <div v-if="errors.has('FK_local')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('FK_local') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('faculdade_id'), 'has-success': fields.faculdade_id && fields.faculdade_id.valid }">
    <label for="faculdade_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.turma.columns.faculdade_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.faculdade_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('faculdade_id'), 'form-control-success': fields.faculdade_id && fields.faculdade_id.valid}" id="faculdade_id" name="faculdade_id" placeholder="{{ trans('admin.turma.columns.faculdade_id') }}">
        <div v-if="errors.has('faculdade_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('faculdade_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('numProfessores'), 'has-success': fields.numProfessores && fields.numProfessores.valid }">
    <label for="numProfessores" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.turma.columns.numProfessores') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.numProfessores" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('numProfessores'), 'form-control-success': fields.numProfessores && fields.numProfessores.valid}" id="numProfessores" name="numProfessores" placeholder="{{ trans('admin.turma.columns.numProfessores') }}">
        <div v-if="errors.has('numProfessores')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('numProfessores') }}</div>
    </div>
</div>


