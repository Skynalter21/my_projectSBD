import AppForm from '../app-components/Form/AppForm';

Vue.component('turma-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                semestre:  '' ,
                FK_local:  '' ,
                faculdade_id:  '' ,
                numProfessores:  '' ,
                
            }
        }
    }

});