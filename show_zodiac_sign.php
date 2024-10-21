<?php include('layouts/header.php'); ?>

<div class="principal">

    <?php


    $data_nascimento = $_POST['data_nascimento'];
    $signos = simplexml_load_file("signos.xml");
    $data_nascimento = new DateTime($data_nascimento);
    $signo_encontrado = false;


    foreach ($signos->signo as $signo) {
        $data_inicio = DateTime::createFromFormat('d/m', (string) $signo->dataInicio);
        $data_fim = DateTime::createFromFormat('d/m', (string) $signo->dataFim);
        $data_inicio->setDate(
            $data_nascimento->format('Y'),
            $data_inicio->format('m'),
            $data_inicio->format('d')
        );
        $data_fim->setDate(
            $data_nascimento->format('Y'),
            $data_fim->format('m'),
            $data_fim->format('d')
        );
        if ($data_inicio > $data_fim) {
            $data_fim->modify('+1 year');

            if ($data_nascimento < $data_inicio && $data_nascimento > $data_fim) {
                continue;
            }
        }
        if ($data_nascimento >= $data_inicio && $data_nascimento <= $data_fim) {
            echo "<p>Seu signo é:</p>";
            echo "<h1 class='text-center'>{$signo->signoNome}</h1>";
            echo "<p>{$signo->descricao}</p>";
            $signo_encontrado = true;
            break;
        }
    }
    if (!$signo_encontrado) {
        echo "<p>Não foi possível determinar seu signo. Verifique a data informada.</p>";
    }
    ?>
    <a href="index.php" class="btn btn-primary mt-3">Voltar</a>
</div>