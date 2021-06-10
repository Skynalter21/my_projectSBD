import AppForm from '../app-components/Form/AppForm';

Vue.component('aluno-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome:  '' ,
                nascimento:  '' ,
                telefone:  '' ,
                faltas:  '' ,
                cra:  '' ,
                FK_idTurma:  '' ,
                FK_idOrientador:  '' ,
                
            }
        }
    }

});