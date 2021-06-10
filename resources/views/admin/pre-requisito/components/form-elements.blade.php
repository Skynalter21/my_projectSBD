<div class="form-group row align-items-center" :class="{'has-danger': errors.has('FK_idDisciplina'), 'has-success': fields.FK_idDisciplina && fields.FK_idDisciplina.valid }">
    <label for="FK_idDisciplina" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pre-requisito.columns.FK_idDisciplina') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.FK_idDisciplina" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('FK_idDisciplina'), 'form-control-success': fields.FK_idDisciplina && fields.FK_idDisciplina.valid}" id="FK_idDisciplina" name="FK_idDisciplina" placeholder="{{ trans('admin.pre-requisito.columns.FK_idDisciplina') }}">
        <div v-if="errors.has('FK_idDisciplina')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('FK_idDisciplina') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('pre_requisito'), 'has-success': fields.pre_requisito && fields.pre_requisito.valid }">
    <label for="pre_requisito" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pre-requisito.columns.pre_requisito') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.pre_requisito" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('pre_requisito'), 'form-control-success': fields.pre_requisito && fields.pre_requisito.valid}" id="pre_requisito" name="pre_requisito" placeholder="{{ trans('admin.pre-requisito.columns.pre_requisito') }}">
        <div v-if="errors.has('pre_requisito')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('pre_requisito') }}</div>
    </div>
</div>


