import AppForm from '../app-components/Form/AppForm';

Vue.component('pre-requisito-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                FK_idDisciplina:  '' ,
                pre_requisito:  '' ,
                
            }
        }
    }

});