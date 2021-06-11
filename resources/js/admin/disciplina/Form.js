import AppForm from '../app-components/Form/AppForm';

Vue.component('disciplina-form', {
    mixins: [AppForm],
    props: ['locais', 'turmas', 'professores'],
    data: function() {
        return {
            form: {
                nome:  '' ,
                sigla:  '' ,
                numCreditos:  '' ,
                turma:  '' ,
                professor:  '' ,
                local:  '' ,
                
            }
        }
    }

});