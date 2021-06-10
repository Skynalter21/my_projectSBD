import AppForm from '../app-components/Form/AppForm';

Vue.component('disciplina-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome:  '' ,
                sigla:  '' ,
                numCreditos:  '' ,
                FK_idTurma:  '' ,
                FK_idProfessor:  '' ,
                
            }
        }
    }

});