import AppForm from '../app-components/Form/AppForm';

Vue.component('turma-form', {
    mixins: [AppForm],
    props: ['faculdades'],
    data: function() {
        return {
            form: {
                semestre:  '' ,
                FK_local:  '' ,
                faculdade:  '' ,
                numProfessores:  '' ,
                
            }
        }
    }

});