import AppForm from '../app-components/Form/AppForm';

Vue.component('faculdade-form', {
    props: ['universidades'],
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome:  '' ,
                sigla:  '' ,
                bloco:  '' ,
                numAlunos:  '' ,
                numProfessor:  '' ,
                orcamento:  '' ,
                universidade: '',
            }
        }
    }

});