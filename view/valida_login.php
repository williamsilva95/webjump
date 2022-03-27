<?PHP
# Validar os dados do usuário

function anti_sql_injection($string)
{
	$con = mysqli_connect('localhost', 'root', '') or die("Erro de conexão");
	$banco = mysqli_select_db($con, 'webjump') or die("Erro ao selecionar o banco de dados");
	$string = stripslashes($string);
	$string = strip_tags($string);
	$string = mysqli_real_escape_string($con, $string);
	return $string;
}
$con = mysqli_connect('localhost', 'root', '') or die("Erro de conexão");
$banco = mysqli_select_db($con, 'webjump') or die("Erro ao selecionar o banco de dados");
$sql = mysqli_query($con, "select * from users where email='" . anti_sql_injection($_POST['email']) . "' and senha='" . anti_sql_injection($_POST['senha']) . "' limit 1") or die("Erro");
$linhas = mysqli_num_rows($sql);
if ($linhas == '') {
?>
	<div>Usuário não encontrado ou usuário e senha inválidos.</div>
<?PHP
} else {
	while ($dados = mysqli_fetch_assoc($sql)) {
		session_start();
		$_SESSION['id'] = $dados['id'];
		$_SESSION['nome'] = $dados['nome'];
		$_SESSION['email'] = $dados['email'];
		
		header("Location: principal.php");
	}
}
?>