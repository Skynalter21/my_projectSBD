import AppForm from '../app-components/Form/AppForm';

Vue.component('diretor-form', {
    props: ['professores'],
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                professor:  '' ,
                
            }
        }
    }

});