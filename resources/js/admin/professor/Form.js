import AppForm from '../app-components/Form/AppForm';

Vue.component('professor-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome:  '' ,
                nascimento:  '' ,
                
            }
        }
    }

});