<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/universidades') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.universidade.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/professors') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.professor.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/diretors') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.diretor.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/faculdades') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.faculdade.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/turmas') }}"><i class="nav-icon icon-puzzle"></i> {{ trans('admin.turma.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/alunos') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.aluno.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/pre-requisitos') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.pre-requisito.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/disciplinas') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.disciplina.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
