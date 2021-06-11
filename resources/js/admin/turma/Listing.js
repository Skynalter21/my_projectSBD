import axios from 'axios';
import AppListing from '../app-components/Listing/AppListing';

Vue.component('turma-listing', {
    mixins: [AppListing],
    data() {
        return  {
            professores: [],
            alunos: [],
        }
    },
    methods: {
        openTurmaInfo(turma) {
            var url, _this2 = this;
            
            url = location.origin + '/' + turma.id + '/info';

            axios.post(url).then(
                function (response) {
                    _this2.$notify({ type: 'success', title: 'Success!', text: response.data.message ? response.data.message : 'Successful operation.' });
                    _this2.showTurmaModal(response.data.professores, response.data.alunos);
                },

                function (error) {
                    _this2.$notify({ type: 'error', title: 'Error!', text: error.response.data.message ? error.response.data.message : 'An error has occured.' });
                }
            )
        },
        showTurmaModal(professores, alunos) {
            this.$modal.show({
                template: `
                <div class="vue-dialog">
                    <div class="p-5">
                        <div class="container-fluid">
                            <div class="my-4">
                                <p v-for="professor in professores" v-html="professor.nome"></p>    
                            </div>

                            <hr>

                            <div class="my-4">
                                <p v-for="aluno in alunos" v-html="aluno.nome"></p>    
                            </div>
                        </div>
                    </div>
                </div>
                  `,
                props: ['professores', 'alunos'],
            }, {
                professores: professores,
                alunos: alunos,
            }, {
                scrollable: true,
                draggable: false,
                width: window.screen.availWidth > 1280 ? '80%' : '95%',
                height: 'auto',
                name: 'transmissionDialog'
            });
        }
    }
});