<?php include('layouts/header.php'); ?>



    <div class="card ">
        <h1 class="text-principal" >Descubra seu signo</h1>
        <hr class="custom-line">
 
        
        <form class="form" id="signo-form" method="POST" action="show_zodiac_sign.php">
            <div class="mb-4 ">
                <label for="data_nascimento" class="form-label text">Data de Nascimento</label> <br>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
            </div>
            <button type="submit" class="btn btn-primary">Descobrir Signo</button>
        </form>
    </div>
