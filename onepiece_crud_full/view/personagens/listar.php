<?php
require_once(__DIR__ . "/../../controller/PersonagemController.php");

$cont  = new PersonagemController();
$lista = $cont->listar();

include_once(__DIR__ . "/../include/header.php");
?>

<div class="d-flex align-items-center mb-3">
  <div class="ms-auto d-flex gap-2">
    <a class="btn btn-danger" href="cards.php">Ver Cards</a>
    <a class="btn btn-primary" href="inserir.php">Novo Personagem</a>
  </div>
</div>


<div class="card shadow-sm">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover table-striped align-middle mb-0">
        <thead class="table-primary">
          <tr>
            <th style="width:70px"></th>
            <th>Imagem</th>
            <th>Nome</th>
            <th style="width:100px">Idade</th>
            <th>Raça</th>
            <th>Afiliação</th>
            <th style="width:170px">Recompensa</th>
            <th style="width:160px" class="text-center">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($lista as $p): ?>
            <tr>
              <td class="fw-semibold"><?= $p->getId(); ?></td>
              <td>
                <?php if($p->getImageUrl()): ?>
                  <img src="<?= htmlspecialchars($p->getImageUrl()); ?>" class="op-avatar" alt="thumb">
                <?php else: ?>
                  <span class="text-muted">—</span>
                <?php endif; ?>
              </td>
              <td class="fw-semibold"><?= htmlspecialchars($p->getNome()); ?></td>
              <td><?= (int)$p->getIdade(); ?></td>
      
              <td><span class="badge text-bg-secondary"><?= htmlspecialchars($p->getRaca()->getNome() ?? ""); ?></span></td>
              <td><span class="badge text-bg-dark"><?= htmlspecialchars($p->getAfiliacao()->getNome() ?? ""); ?></span></td>
              <td>฿ <?= number_format($p->getRecompensa(), 2, ',', '.'); ?></td>
              <td class="text-center">
                <a class="btn btn-sm btn-primary" href="alterar.php?id=<?= $p->getId(); ?>">Editar</a>
                <a class="btn btn-sm btn-outline-danger" href="excluir.php?id=<?= $p->getId(); ?>" onclick="return confirm('Excluir personagem?');">Excluir</a>
              </td>
            </tr>
          <?php endforeach; ?>
          <?php if(empty($lista)): ?>
            <tr><td colspan="8" class="text-center py-4 text-muted">Nenhum personagem cadastrado.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include_once(__DIR__ . "/../include/footer.php"); ?>
