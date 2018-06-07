@extends('templates/conectado')


@section('pagetitle')
    meus processos | revi
@endsection

@section('maincontent')
    <div class="container">
        <h1 class="textcenter">meus processos</h1>

        <div class="form-container">

            <div class="container side-side">
                <?php
                $processos = $data['processos'];

                if(count($processos) > 0) {
                    foreach($processos as $processo) {

                        echo '<div class="content textcenter block">';
                        echo '<b>'.(($processo->getName() != null) ?
                                $processo->getName() : '<i>Processo não finalizado</i>').'</b>';
                        echo ', atualizado em ' . date('d/m/Y, H:i', strtotime($processo->getUpdatedAt()));
                        echo '</div>';
                    }
                } else
                    echo '<div class="content textcenter">'
                        .'<b>Está solitário por aqui</b>. Que tal criar um novo processo?'
                        .'</div>';
                ?>
            </div>

            <div class="container options side-side">
                <div class="content block">
                    <h3 class="textcenter">processo não finalizado</h3>
                    <br>
                    <?php
                    $unfinished = $data['processoNaoTerminado'];

                    if(count($unfinished) == 0)
                        echo '<p class="textcenter">Você não possui nenhum processo com a criação em andamento!</p>';
                    else {
                        $obj = $unfinished['obj'][0];
                        $phase = $unfinished['phaseNo'];
                        $percentage = $unfinished['percentage'];

                        echo '<p class="textcenter"><b>Você possui um processo com a criação ainda em andamento!</b></p>';
                        echo '<br>';

                        echo '<p>Ele foi criado em <b>'.date('d/m/Y, à\s H:i', strtotime($obj->getCreatedAt()))
                            .'</b> e está na <b>etapa '.$phase.'</b> do processo de criação.</p>';
                        echo '<br>';

                        echo '<div class="progressbar">'
                            .'<span class="progressconut" style="width: '.$percentage.'%;"></span>'
                            .'</div>';

                        echo '<br>';
                        echo '<p>Para continuar sua construção, acesse a página de '
                            .'<a href="criar">criação</a> e prossiga de onde parou!</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
@endsection