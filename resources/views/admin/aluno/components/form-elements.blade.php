<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
    <label for="nome" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aluno.columns.nome') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nome" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}" id="nome" name="nome" placeholder="{{ trans('admin.aluno.columns.nome') }}">
        <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nascimento'), 'has-success': fields.nascimento && fields.nascimento.valid }">
    <label for="nascimento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aluno.columns.nascimento') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.nascimento" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('nascimento'), 'form-control-success': fields.nascimento && fields.nascimento.valid}" id="nascimento" name="nascimento" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('nascimento')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nascimento') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('telefone'), 'has-success': fields.telefone && fields.telefone.valid }">
    <label for="telefone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aluno.columns.telefone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.telefone" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('telefone'), 'form-control-success': fields.telefone && fields.telefone.valid}" id="telefone" name="telefone" placeholder="{{ trans('admin.aluno.columns.telefone') }}">
        <div v-if="errors.has('telefone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('telefone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('faltas'), 'has-success': fields.faltas && fields.faltas.valid }">
    <label for="faltas" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aluno.columns.faltas') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.faltas" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('faltas'), 'form-control-success': fields.faltas && fields.faltas.valid}" id="faltas" name="faltas" placeholder="{{ trans('admin.aluno.columns.faltas') }}">
        <div v-if="errors.has('faltas')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('faltas') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cra'), 'has-success': fields.cra && fields.cra.valid }">
    <label for="cra" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aluno.columns.cra') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cra" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cra'), 'form-control-success': fields.cra && fields.cra.valid}" id="cra" name="cra" placeholder="{{ trans('admin.aluno.columns.cra') }}">
        <div v-if="errors.has('cra')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cra') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('FK_idTurma'), 'has-success': fields.FK_idTurma && fields.FK_idTurma.valid }">
    <label for="FK_idTurma" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aluno.columns.FK_idTurma') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.FK_idTurma" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('FK_idTurma'), 'form-control-success': fields.FK_idTurma && fields.FK_idTurma.valid}" id="FK_idTurma" name="FK_idTurma" placeholder="{{ trans('admin.aluno.columns.FK_idTurma') }}">
        <div v-if="errors.has('FK_idTurma')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('FK_idTurma') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('FK_idOrientador'), 'has-success': fields.FK_idOrientador && fields.FK_idOrientador.valid }">
    <label for="FK_idOrientador" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aluno.columns.FK_idOrientador') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.FK_idOrientador" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('FK_idOrientador'), 'form-control-success': fields.FK_idOrientador && fields.FK_idOrientador.valid}" id="FK_idOrientador" name="FK_idOrientador" placeholder="{{ trans('admin.aluno.columns.FK_idOrientador') }}">
        <div v-if="errors.has('FK_idOrientador')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('FK_idOrientador') }}</div>
    </div>
</div>


