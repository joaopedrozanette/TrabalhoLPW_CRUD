<?php
require_once(__DIR__ . "/../../controller/PersonagemController.php");
$cont = new PersonagemController();

$erros = [];
$dados = [
  'id'            => $_GET['id'] ?? null,
  'nome'          => '',
  'idade'         => '',
  'akuma_no_mi'   => '',
  'raca_id'       => '',
  'afiliacao_id'  => '',
  'recompensa'    => '0',
  'descricao'     => '',
  'image_url'     => ''
];

if(isset($_GET['id'])){
  $p = $cont->buscar((int)$_GET['id']);
  if($p){
    $dados['id']           = $p->getId();
    $dados['nome']         = $p->getNome();
    $dados['idade']        = $p->getIdade();
    $dados['akuma_no_mi']  = $p->getAkumaNoMi();
    $dados['raca_id']      = $p->getRaca()->getId();
    $dados['afiliacao_id'] = $p->getAfiliacao()->getId();
    $dados['recompensa']   = $p->getRecompensa();
    $dados['descricao']    = $p->getDescricao();
    $dados['image_url']    = $p->getImageUrl();
  }
}

$racas       = $cont->racas();
$afiliacoes  = $cont->afiliacoes();

if($_SERVER['REQUEST_METHOD']==='POST'){
  $dados = array_merge($dados, $_POST);
  if(!empty($dados['id'])) $erros = $cont->alterar($dados);
  else                     $erros = $cont->inserir($dados);
  if(!$erros){
    header("location: listar.php");
    exit;
  }
}

include_once(__DIR__ . "/../include/header.php");
?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3 mb-0"><?= !empty($dados['id']) ? 'Editar' : 'Novo' ?> Personagem</h1>
  <a class="btn btn-outline-secondary" href="listar.php">Voltar</a>
</div>

<?php if($erros): ?>
  <div class="alert alert-danger">
    <strong>Corrija os erros abaixo:</strong>
    <ul class="mb-0"><?php foreach($erros as $e): ?><li><?= htmlspecialchars($e); ?></li><?php endforeach; ?></ul>
  </div>
<?php endif; ?>

<div class="card shadow-sm">
  <div class="card-body">
    <form method="post" class="row g-3">
      <?php if(!empty($dados['id'])): ?>
        <input type="hidden" name="id" value="<?= (int)$dados['id']; ?>">
      <?php endif; ?>

      <div class="col-md-6">
        <label class="form-label">Nome</label>
        <input class="form-control" name="nome" value="<?= htmlspecialchars($dados['nome']); ?>">
      </div>

      <div class="col-md-3">
        <label class="form-label">Idade</label>
        <input type="number" class="form-control" name="idade" min="1" value="<?= htmlspecialchars($dados['idade']); ?>">
      </div>

      <div class="col-md-3">
        <label class="form-label">Recompensa (฿)</label>
        <input class="form-control" name="recompensa" value="<?= htmlspecialchars($dados['recompensa']); ?>">
      </div>

      <div class="col-md-6">
        <label class="form-label">Akuma no Mi</label>
        <input class="form-control" name="akuma_no_mi" placeholder="ex.: Gomu Gomu no Mi" value="<?= htmlspecialchars($dados['akuma_no_mi']); ?>">
      </div>

      <div class="col-md-3">
        <label class="form-label">Raça</label>
        <select class="form-select" name="raca_id">
          <option value="">-- selecione --</option>
          <?php foreach($racas as $r): ?>
            <option value="<?= $r['id']; ?>" <?= ($dados['raca_id']==$r['id']?'selected':''); ?>>
              <?= htmlspecialchars($r['nome']); ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-md-3">
        <label class="form-label">Afiliação</label>
        <select class="form-select" name="afiliacao_id">
          <option value="">-- selecione --</option>
          <?php foreach($afiliacoes as $a): ?>
            <option value="<?= $a['id']; ?>" <?= ($dados['afiliacao_id']==$a['id']?'selected':''); ?>>
              <?= htmlspecialchars($a['nome']); ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-12">
        <label class="form-label">URL da Imagem</label>
        <input class="form-control" name="image_url" placeholder="https://..." value="<?= htmlspecialchars($dados['image_url']); ?>">
      </div>

      <div class="col-12">
        <label class="form-label">Descrição</label>
        <textarea class="form-control" name="descricao" rows="4" placeholder="Breve perfil do personagem..."><?= htmlspecialchars($dados['descricao']); ?></textarea>
      </div>

      <div class="col-12 d-flex gap-2">
        <button class="btn btn-success">Salvar</button>
        <a class="btn btn-outline-secondary" href="listar.php">Cancelar</a>
      </div>
    </form>
  </div>
</div>

<?php include_once(__DIR__ . "/../include/footer.php"); ?>
