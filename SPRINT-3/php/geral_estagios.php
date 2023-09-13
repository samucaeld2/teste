<?php
$con = new mysqli("localhost", "root", "", "estagiosPIT");

?>

<!DOCTYPE html>

<body>

<form method="POST">
    <h1>Filtros</h1>

    <input type="text" name="min" placeholder="Valor Minimo">
    <input type="text" name="max" placeholder="Valor Maximo">
    <button name="procura">Procurar</button>

    <!-- <select name="Valor da Bolsa">
        <option value="">Valor da Bolsa</option>
        <option class="" value="1">R$400 - R$ 800</option>
        <option class="" value="2">R$ 800 - R$ 1200</option>
        <option class="" value="3">R$ 1200 - R$ 2000</option>
    </select> -->

    <!-- <select name="Localidade">
        <option value="">Localização</option>
        <option class="" value="4">Belo Horizonte</option>
        <option class="" value="5">Contagem</option>
        <option class="" value="6">Sabará</option>
    </select>

    <select name="Hórario" placeholder="horario">
        <option value="">Carga Horária</option>
        <option class="" value="7">4 horas</option>
        <option class="" value="8">5 horas</option>
        <option class="" value="9">6 horas</option>
    </select> -->
</form>

<br><br>

<?php
if(isset($_POST['procura'])){
    $max = $_POST['max'];
    $min = $_POST['min'];
    $query = "SELECT * FROM cadastroEstagio where bolsa between $min and $max;";
}
else{
    $query = "SELECT * FROM cadastroEstagio;";
}

$query_run = mysqli_query($con, $query);

if (mysqli_num_rows($query_run) > 0) {
    $estagio = mysqli_fetch_array($query_run);
    
}

foreach ($query_run as $estagio) {
?>
    <tr>
        <td>
            <div>
                nome: <?= $estagio['nome']; ?><br>
                localização: <?= $estagio['localizacao']; ?><br>
                contato: <?= $estagio['contato']; ?><br>
                bolsa: <?= $estagio['bolsa']; ?><br>
                cargaHoraria: <?= $estagio['cargaHoraria']; ?><br>
                conhecomento: <?= $estagio['conhecimento']; ?><br>
                informações adicionais: <?= $estagio['informaçõesExtras']; ?><br><br><br><br><br>
            </div>
        </td>
    </tr>
<?php
}





?>
<form action="../html/landingPage.html">
    <br>
    <br>
    <a href="#"><button>home</button></a> 
</form>
</body>


<?php

?>