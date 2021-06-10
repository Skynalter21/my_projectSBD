import AppForm from '../app-components/Form/AppForm';

Vue.component('universidade-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome:  '' ,
                
            }
        }
    }

});